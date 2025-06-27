<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderProductsRelationManager extends RelationManager
{
        protected static string $relationship = 'OrderProducts';

        

        
        public function table(Table $table): Table
        {
            
            return $table
                ->recordTitleAttribute('Order')
                ->columns([
                    // Aquí pedimos explícitamente el nombre del producto
                    TextColumn::make('product.name')
                        ->label('Producto')
                        ->sortable(),

                    TextColumn::make('quantity')
                        ->label('Cantidad'),

                    TextColumn::make('product.price')
                        ->label('Precio Unit.')
                        ->money('BOB'),

                    TextColumn::make('subTotal')
                        ->label('Subtotal')
                        ->money('BOB'),
                ])
                ->filters([
                    //
                ])
                ->headerActions([
                    Tables\Actions\CreateAction::make(),
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        }
}
