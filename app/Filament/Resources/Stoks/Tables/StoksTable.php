<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier.supplier_nama')
                    ->label('Supplier')
                    ->searchable(),

                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->searchable(),

                TextColumn::make('user.nama')
                    ->label('Diinput Oleh'),

                TextColumn::make('stok_tanggal')
                    ->label('Tanggal')
                    ->dateTime('d/m/Y H:i'),

                TextColumn::make('stok_jumlah')
                    ->label('Jumlah')
                    ->badge()
                    ->color('success'),
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
            ->emptyStateHeading('Belum ada stok')
            ->emptyStateDescription('Tambahkan data stok terlebih dahulu')
            ->emptyStateIcon('heroicon-o-archive-box');
    }
}