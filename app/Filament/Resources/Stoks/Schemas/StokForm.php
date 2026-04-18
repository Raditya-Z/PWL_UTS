<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;

class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Stok')
                    ->description('Input stok barang dari supplier')
                    ->icon('heroicon-m-archive-box')
                    ->components([

                        Select::make('supplier_id')
                            ->label('Supplier')
                            ->relationship('supplier', 'supplier_nama')
                            ->required(),

                        Select::make('barang_id')
                            ->label('Barang')
                            ->relationship('barang', 'barang_nama')
                            ->required(),

                        DateTimePicker::make('stok_tanggal')
                            ->label('Tanggal Stok')
                            ->required(),

                        TextInput::make('stok_jumlah')
                            ->label('Jumlah Stok')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }
}