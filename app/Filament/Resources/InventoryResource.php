<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\Inventory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;
    protected static ?string $navigationGroup = 'Menu principal';
    protected static ?string $navigationLabel = 'Inventarios';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('warehouse_id')
                    ->label('Almacén')
                    ->relationship('warehouse', 'name')
                    ->preload()
                    ->default(1)
                    ->searchable()
                    ->required(),

                Select::make('product_id')
                    ->label('Producto')
                    ->searchable()
                    ->relationship('product', 'name')
                    ->preload()
                    ->default(1)
                    ->required(),

                TextInput::make('stock')
                    ->label('Cantidad')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('warehouse.name')
                    ->label('Almacén'),

                TextColumn::make('product.code')
                    ->searchable()
                    ->label('Codigo'),
                
                TextColumn::make('product.name')
                    ->searchable()
                    ->label('Producto'),

                TextColumn::make('stock')
                    ->label('Stock'),
            ])
            ->filters([
                SelectFilter::make('warehouse_id')
                    ->label('Almacén')
                    ->relationship('warehouse', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }
}
