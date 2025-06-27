<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderProductsRelationManagerRelationManager extends RelationManager
{
    // protected static string $relationship = 'OrderProductsRelationManager';

    // public function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('Order')
    //                 ->required()
    //                 ->maxLength(255),
    //         ]);
    // }

    // public function table(Tables\Table $table): Tables\Table
    // {
    //     return $table
    //         ->columns([
    //             // Aquí pedimos explícitamente el nombre del producto
    //             TextColumn::make('product.name')
    //                 ->label('Producto')
    //                 ->sortable()
    //                 ->searchable(),

    //             TextColumn::make('quantity')
    //                 ->label('Cantidad'),

    //             TextColumn::make('unit_price')
    //                 ->label('Precio Unit.')
    //                 ->money('BOB'),

    //             TextColumn::make('sub_total')
    //                 ->label('Subtotal')
    //                 ->money('BOB'),
    //         ])
    //         ->headerActions([
    //             Tables\Actions\CreateAction::make(),
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //             Tables\Actions\DeleteAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\DeleteBulkAction::make(),
    //         ]);
    // }
}
