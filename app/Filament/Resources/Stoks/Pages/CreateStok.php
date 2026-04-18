<?php

namespace App\Filament\Resources\Stoks\Pages;

use App\Filament\Resources\Stoks\StokResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateStok extends CreateRecord
{
    protected static string $resource = StokResource::class;



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->user_id;
        return $data;
    }

    public function getTitle(): string
    {
        return 'Tambah Stok';
    }

    public function getHeading(): string
    {
        return 'Input Stok Barang';
    }

    public function getSubheading(): ?string
    {
        return 'Masukkan data stok barang dari supplier';
    }
}