<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use App\Models\Barang;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Informasi Penjualan')
                        ->icon('heroicon-m-document-text')
                        ->schema([

                            TextInput::make('penjualan_kode')
                                ->label('Kode Penjualan')
                                ->required()
                                ->maxLength(20)
                                ->unique(
                                    table: 't_penjualan',
                                    column: 'penjualan_kode',
                                    ignoreRecord: true
                                ),

                            TextInput::make('pembeli')
                                ->label('Nama Pembeli')
                                ->required()
                                ->maxLength(100),

                            DateTimePicker::make('penjualan_tanggal')
                                ->label('Tanggal Transaksi')
                                ->required(),

                        ]),

                    Step::make('Detail Barang')
                        ->icon('heroicon-m-shopping-cart')
                        ->schema([

                            Repeater::make('details')
                                ->relationship()
                                ->label('Detail Barang')
                                ->schema([

                                    Select::make('barang_id')
                                        ->label('Barang')
                                        ->relationship('barang', 'barang_nama')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $barang = Barang::find($state);

                                            if ($barang) {
                                                $set('harga', $barang->harga_jual);
                                            }
                                        }),

                                    TextInput::make('harga')
                                        ->label('Harga')
                                        ->numeric()
                                        ->required()
                                        ->minValue(1),

                                    TextInput::make('jumlah')
                                        ->label('Jumlah')
                                        ->numeric()
                                        ->required()
                                        ->minValue(1),

                                ])
                                ->columns(3)
                                ->required(),

                        ]),

                ])
                ->columnSpanFull(),
            ]);
    }
}