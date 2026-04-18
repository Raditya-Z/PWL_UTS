<?php

namespace App\Filament\Resources\Stoks\Pages;

use App\Filament\Resources\Stoks\StokResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditStok extends EditRecord
{
    protected static string $resource = StokResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = Auth::user()->user_id;
        return $data;
    }

    public function getTitle(): string
    {
        return 'Edit Stok';
    }

    public function getHeading(): string
    {
        return 'Edit Data Stok';
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui data stok barang';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}