<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBarangs extends ListRecords
{
    protected static string $resource = BarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Barang')
                ->icon('heroicon-m-plus'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manajemen Barang';
    }

    public function getHeading(): string
    {
        return 'Daftar Barang';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola semua data barang';
    }
}