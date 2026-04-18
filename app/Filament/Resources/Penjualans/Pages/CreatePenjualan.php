<?php

namespace App\Filament\Resources\Penjualans\Pages;

use App\Filament\Resources\Penjualans\PenjualanResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\Stok;

class CreatePenjualan extends CreateRecord
{
    protected static string $resource = PenjualanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->user_id;
        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->details as $detail) {
            Stok::create([
                'supplier_id' => 1,
                'barang_id' => $detail->barang_id,
                'user_id' => Auth::user()->user_id,
                'stok_tanggal' => now(),
                'stok_jumlah' => -$detail->jumlah,
            ]);
        }
    }

    public function getTitle(): string
    {
        return 'Tambah Penjualan';
    }

    public function getHeading(): string
    {
        return 'Transaksi Penjualan';
    }

    public function getSubheading(): ?string
    {
        return 'Input transaksi penjualan barang';
    }
}