<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Barang')
                    ->description('Lengkapi data barang dengan benar')
                    ->icon('heroicon-m-cube')
                    ->components([

                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship('kategori', 'kategori_nama')
                            ->required(),

                        TextInput::make('barang_kode')
                            ->label('Kode Barang')
                            ->placeholder('Cth: BRG001')
                            ->required()
                            ->maxLength(10)
                            ->unique(table: 'm_barang', column: 'barang_kode', ignoreRecord: true),

                        TextInput::make('barang_nama')
                            ->label('Nama Barang')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('harga_beli')
                            ->label('Harga Beli')
                            ->numeric()
                            ->required(),

                        TextInput::make('harga_jual')
                            ->label('Harga Jual')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }
}