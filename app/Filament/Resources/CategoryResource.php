<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationGroup = 'Menu principal';
    protected static ?string $navigationLabel = 'Categorías';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Nombre")
                    ->required()
                    ->placeholder("Ej: Auiculares"),

                Forms\Components\TextInput::make('summary')
                    ->label("Resumen")
                    ->required()
                    ->placeholder("Agrega un resumen de la categoria"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre'),

                TextColumn::make('summary')
                    ->label('Resumen')
                    ->limit(40),

                TextColumn::make('created_at')
                    ->label('Fecha de registro')
                    ->date(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-m-pencil-square')
                    ->iconButton(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
