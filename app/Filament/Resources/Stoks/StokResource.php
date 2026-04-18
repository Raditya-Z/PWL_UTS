<?php

namespace App\Filament\Resources\Stoks;

use App\Filament\Resources\Stoks\Pages\CreateStok;
use App\Filament\Resources\Stoks\Pages\EditStok;
use App\Filament\Resources\Stoks\Pages\ListStoks;
use App\Filament\Resources\Stoks\Schemas\StokForm;
use App\Filament\Resources\Stoks\Tables\StoksTable;
use App\Models\Stok;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static ?string $navigationLabel = 'Stok';

    protected static ?string $modelLabel = 'Stok';

    protected static ?string $pluralModelLabel = 'Stok';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $recordTitleAttribute = 'stok_id';

    public static function form(Schema $schema): Schema
    {
        return StokForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoksTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStoks::route('/'),
            'create' => CreateStok::route('/create'),
            'edit' => EditStok::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::check();
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