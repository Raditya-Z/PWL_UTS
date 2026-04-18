<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->description('Lengkapi data kategori dengan benar')
                    ->icon('heroicon-m-tag')
                    ->components([
                        TextInput::make('kategori_kode')
                            ->label('Kode Kategori')
                            ->placeholder('Cth: KTG001')
                            ->helperText('Maksimal 10 karakter, harus unik')
                            ->required()
                            ->maxLength(10)
                            ->unique(table: 'm_kategori', column: 'kategori_kode', ignoreRecord: true),

                        TextInput::make('kategori_nama')
                            ->label('Nama Kategori')
                            ->placeholder('Masukkan nama kategori')
                            ->required()
                            ->maxLength(100),
                    ]),
            ]);
    }
}