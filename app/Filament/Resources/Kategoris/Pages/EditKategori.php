<?php

namespace App\Filament\Resources\Kategoris\Pages;

use App\Filament\Resources\Kategoris\KategoriResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKategori extends EditRecord
{
    protected static string $resource = KategoriResource::class;

    public function getTitle(): string
    {
        return 'Edit Kategori';
    }

    public function getHeading(): string
    {
        return 'Edit Data Kategori';
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui informasi kategori';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}