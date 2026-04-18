<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Level')
                    ->description('Isi kode dan nama level sesuai hak akses pengguna.')
                    ->icon('heroicon-m-shield-check')
                    ->components([
                        TextInput::make('level_kode')
                            ->label('Kode Level')
                            ->placeholder('Cth: LVL001')
                            ->helperText('Kode level harus unik dan maksimal 10 karakter.')
                            ->required()
                            ->maxLength(10)
                            ->unique(table: 'm_level', column: 'level_kode', ignoreRecord: true),
                        TextInput::make('level_nama')
                            ->label('Nama Level')
                            ->placeholder('Administrator, Kasir, dll')
                            ->required()
                            ->maxLength(100),
                    ]),
            ]);
    }
}
