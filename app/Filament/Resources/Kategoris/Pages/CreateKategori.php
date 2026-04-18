<?php

namespace App\Filament\Resources\Kategoris\Pages;

use App\Filament\Resources\Kategoris\KategoriResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    public function getTitle(): string
    {
        return 'Buat Kategori Baru';
    }

    public function getHeading(): string
    {
        return 'Tambah Kategori';
    }

    public function getSubheading(): ?string
    {
        return 'Isikan data kategori baru ke dalam sistem';
    }
}