<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Validation\Rule;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Supplier')
                    ->description('Lengkapi data supplier dengan benar')
                    ->icon('heroicon-m-truck')
                    ->components([
                        TextInput::make('supplier_kode')
                            ->label('Kode Supplier')
                            ->placeholder('Cth: SUP001')
                            ->helperText('Maksimal 10 karakter, harus unik')
                            ->required()
                            ->maxLength(10)
                            ->unique(table: 'm_supplier', column: 'supplier_kode', ignoreRecord: true),
                        TextInput::make('supplier_nama')
                            ->label('Nama Supplier')
                            ->placeholder('Nama lengkap supplier')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('supplier_alamat')
                            ->label('Alamat Supplier')
                            ->placeholder('Jl. ... Kota ...')
                            ->helperText('Alamat lengkap untuk kemudahan komunikasi')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }
}
