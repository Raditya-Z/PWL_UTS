<?php

namespace App\Filament\Resources\Barangs;

use App\Filament\Resources\Barangs\Pages\CreateBarang;
use App\Filament\Resources\Barangs\Pages\EditBarang;
use App\Filament\Resources\Barangs\Pages\ListBarangs;
use App\Filament\Resources\Barangs\Schemas\BarangForm;
use App\Filament\Resources\Barangs\Tables\BarangsTable;
use App\Models\Barang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $modelLabel = 'Barang';

    protected static ?string $pluralModelLabel = 'Barang';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cube';

    protected static ?string $recordTitleAttribute = 'barang_nama';

    public static function form(Schema $schema): Schema
    {
        return BarangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BarangsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarangs::route('/'),
            'create' => CreateBarang::route('/create'),
            'edit' => EditBarang::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return optional(Auth::user())->isAdmin() ?? false;
    }

    public static function canCreate(): bool
    {
        return optional(Auth::user())->isAdmin() ?? false;
    }

    public static function canEdit($record): bool
    {
        return optional(Auth::user())->isAdmin() ?? false;
    }

    public static function canDelete($record): bool
    {
        return optional(Auth::user())->isAdmin() ?? false;
    }
}