<?php

namespace App\Filament\Resources\Suppliers\Pages;

use App\Filament\Resources\Suppliers\SupplierResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSupplier extends CreateRecord
{
    protected static string $resource = SupplierResource::class;

    public function getTitle(): string
    {
        return 'Buat Supplier Baru';
    }

    public function getHeading(): string
    {
        return 'Tambah Supplier';
    }

    public function getSubheading(): ?string
    {
        return 'Isikan data supplier baru ke dalam sistem';
    }
}
