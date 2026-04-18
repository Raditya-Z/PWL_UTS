<?php

namespace App\Filament\Resources\Suppliers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SuppliersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier_kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('supplier_nama')
                    ->label('Nama Supplier')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('supplier_alamat')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label('Tgl. Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
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
            ->emptyStateHeading('Belum ada supplier')
            ->emptyStateDescription('Mulai dengan membuat supplier baru')
            ->emptyStateIcon('heroicon-o-truck');
    }
}
