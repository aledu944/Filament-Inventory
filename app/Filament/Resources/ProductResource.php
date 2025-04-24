<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    
    protected static ?string $navigationGroup = 'Menu principal';
    protected static ?string $navigationLabel = 'Productos';
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información del producto')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('¿Está activo?')
                            ->default(true),

                        Forms\Components\TextInput::make('code')
                            ->label('Código')
                            ->required()
                            ->maxLength(255),


                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('summary')
                            ->label('Resumen')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price')
                            ->label('Precio')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->suffix('Bs.'),
                        Forms\Components\Select::make('category_id')
                            ->label('Categoría')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columnSpan(1),
                Section::make('Imágenes del producto')
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('image')
                            ->disk('public')
                            ->label('Imágen')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/*'])
                            ->required(),
                    ]),

                Section::make('Descripción del producto')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Descripción')
                            ->required(),
                    ])->columnSpan(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                ImageColumn::make('image')
                    ->label('Imágen')
                    ->disk('public')
                    ->size(50)
                    ->toggleable(),
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('summary')
                    ->label('Resumen')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make("category_id")
                    ->label('Categoría')
                    ->getStateUsing(function ($record) {
                        return $record->category->name;
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('is_active')
                    ->badge()
                    ->label('Estado')
                    ->formatStateUsing(fn(bool $state): string => $state ? 'Activo' : 'Inactivo')
                    ->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name'),
            ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
