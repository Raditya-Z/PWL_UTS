<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang_kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                TextColumn::make('barang_nama')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                TextColumn::make('kategori.kategori_nama')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('harga_beli')
                    ->label('Harga Beli')
                    ->money('IDR'),

                TextColumn::make('harga_jual')
                    ->label('Harga Jual')
                    ->money('IDR'),

                TextColumn::make('created_at')
                    ->label('Tgl Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada barang')
            ->emptyStateDescription('Silakan tambahkan barang baru')
            ->emptyStateIcon('heroicon-o-cube');
    }
}