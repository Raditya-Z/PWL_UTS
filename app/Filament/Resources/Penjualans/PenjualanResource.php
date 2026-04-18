<?php

namespace App\Filament\Resources\Penjualans;

use App\Filament\Resources\Penjualans\Pages\CreatePenjualan;
use App\Filament\Resources\Penjualans\Pages\EditPenjualan;
use App\Filament\Resources\Penjualans\Pages\ListPenjualans;
use App\Filament\Resources\Penjualans\Pages\ViewPenjualan;
use App\Filament\Resources\Penjualans\Schemas\PenjualanForm;
use App\Filament\Resources\Penjualans\Tables\PenjualansTable;
use App\Models\Penjualan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    protected static ?string $navigationLabel = 'Penjualan';

    protected static ?string $modelLabel = 'Penjualan';

    protected static ?string $pluralModelLabel = 'Penjualan';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $recordTitleAttribute = 'penjualan_kode';

    public static function form(Schema $schema): Schema
    {
        return PenjualanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenjualansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenjualans::route('/'),
            'create' => CreatePenjualan::route('/create'),
            'edit' => EditPenjualan::route('/{record}/edit'),
            'view' => ViewPenjualan::route('/{record}'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::check(); // admin & kasir
    }

    public static function canCreate(): bool
    {
        return Auth::check();
    }

    public static function canEdit($record): bool
    {
        return Auth::check();
    }

    public static function canDelete($record): bool
    {
        return optional(Auth::user())->isAdmin() ?? false;
    }
    
}