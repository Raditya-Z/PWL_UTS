<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBarang extends EditRecord
{
    protected static string $resource = BarangResource::class;

    public function getTitle(): string
    {
        return 'Edit Barang';
    }

    public function getHeading(): string
    {
        return 'Edit Data Barang';
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui informasi barang';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}