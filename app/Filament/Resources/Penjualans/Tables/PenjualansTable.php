<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penjualan_kode')
                    ->label('Kode')
                    ->searchable()
                    ->badge()
                    ->color('primary'),

                TextColumn::make('pembeli')
                    ->label('Pembeli')
                    ->searchable(),

                TextColumn::make('user.nama')
                    ->label('Kasir'),

                TextColumn::make('penjualan_tanggal')
                    ->label('Tanggal')
                    ->dateTime('d/m/Y H:i'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),

                TextColumn::make('total')
                    ->label('Total')
                    ->getStateUsing(fn ($record) => 
                        $record->details->sum(fn ($d) => $d->harga * $d->jumlah))
                    ->money('IDR', true),
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
            ->emptyStateHeading('Belum ada transaksi')
            ->emptyStateDescription('Mulai dengan membuat transaksi baru')
            ->emptyStateIcon('heroicon-o-shopping-cart');
    }
}