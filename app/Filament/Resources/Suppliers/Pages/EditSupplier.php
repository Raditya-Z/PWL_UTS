<?php

namespace App\Filament\Resources\Suppliers\Pages;

use App\Filament\Resources\Suppliers\SupplierResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSupplier extends EditRecord
{
    protected static string $resource = SupplierResource::class;

    public function getTitle(): string
    {
        return 'Edit Supplier';
    }

    public function getHeading(): string
    {
        return 'Edit Data Supplier';
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui informasi supplier';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
