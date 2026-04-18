<?php

namespace App\Filament\Resources\Suppliers\Pages;

use App\Filament\Resources\Suppliers\SupplierResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Supplier')
                ->icon('heroicon-m-plus'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manajemen Supplier';
    }

    public function getHeading(): string
    {
        return 'Daftar Supplier';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola semua data supplier perusahaan Anda';
    }
}
