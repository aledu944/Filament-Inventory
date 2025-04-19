<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Order Details')
                    ->schema([
                        Select::make('customer_id')
                            ->relationship('customer', 'name')
                            ->preload()
                            ->required()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('address')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
                Section::make('Items')
                    ->schema([
                        Repeater::make('orderProducts')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->required(),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required(),
                                TextInput::make('subTotal')
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(3)
                            ->label('Order Details')
                            ->defaultItems(1)
                            ->createItemButtonLabel('Agregar producto'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Codigo'),
                TextColumn::make('customer.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total')
                    ->label('Total')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
