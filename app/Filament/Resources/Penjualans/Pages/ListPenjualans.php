<?php

namespace App\Filament\Resources\Penjualans\Pages;

use App\Filament\Resources\Penjualans\PenjualanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenjualans extends ListRecords
{
    protected static string $resource = PenjualanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Transaksi')
                ->icon('heroicon-m-plus'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manajemen Penjualan';
    }

    public function getHeading(): string
    {
        return 'Data Penjualan';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola transaksi penjualan';
    }
}