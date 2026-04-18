<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;

    public function getTitle(): string
    {
        return 'Buat Barang Baru';
    }

    public function getHeading(): string
    {
        return 'Tambah Barang';
    }

    public function getSubheading(): ?string
    {
        return 'Isikan data barang baru ke dalam sistem';
    }
}