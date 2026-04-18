<?php

namespace App\Filament\Resources\Penjualans\Pages;

use App\Filament\Resources\Penjualans\PenjualanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditPenjualan extends EditRecord
{
    protected static string $resource = PenjualanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = Auth::user()->user_id;
        return $data;
    }

    public function getTitle(): string
    {
        return 'Edit Penjualan';
    }

    public function getHeading(): string
    {
        return 'Edit Transaksi';
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui data transaksi';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}