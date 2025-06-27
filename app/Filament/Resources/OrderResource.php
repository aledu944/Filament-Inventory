<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\OrderProductsRelationManager;
use App\Filament\Resources\OrderResource\RelationManagers\OrderProductsRelationManagerRelationManager;
use App\Filament\Resources\OrderResource\Widgets\OrderWidget;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'CRM';
    protected static ?string $navigationLabel = 'Ventas';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

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
                Section::make('Items')->schema([
                    // 1) Almacén: debe ser “live” y no persistirse si no quieres guardarlo
                    Select::make('warehouse_id')
                        ->label('Almacén')
                        ->options(Warehouse::pluck('name', 'id')->toArray())
                        ->required()
                        ->live()                        // ← recarga el formulario al cambiar :contentReference[oaicite:10]{index=10}
                        ->dehydrated(false)
                        ->afterStateUpdated(fn(Get $get, Set $set) => $set('orderProducts', [])),

                    // 2) Repeater de productos: también “live”
                    Repeater::make('orderProducts')
                        ->relationship()               // carga la relación HasMany automáticamente :contentReference[oaicite:11]{index=11}
                        ->live()                       // ← re-renderiza cada fila al cambiar el formulario :contentReference[oaicite:12]{index=12}
                        ->columns(4)
                        // ->extraAttributes(['wire:poll.1500ms' => '']) // opcional: actualiza cada 500ms
                        ->extraAttributes(["wire:poll.visible" => ''])
                        ->schema([
                            Select::make('product_id')
                                ->label('Producto')
                                ->searchable()
                                ->required()
                                ->reactive()
                                ->live()   // ← reactiva el select para volver a invocar options() al cambiar warehouse_id
                                ->options(
                                    fn(Get $get): array => Product::query()
                                        // Filtrar productos por inventarios en el almacén real
                                        ->whereHas(
                                            'inventories',
                                            fn($q) => $q
                                                ->where('warehouse_id', $get('../../warehouse_id'))
                                        )
                                        ->pluck('name', 'id')   // array [id => nombre]
                                        ->toArray()
                                ),
                            TextInput::make('quantity')
                                ->label('Cantidad')
                                ->numeric()
                                ->required()
                                ->rule(function (Get $get) {
                                    $productId = $get('product_id');
                                    $warehouseId = $get('../../warehouse_id');

                                    if (!$productId || !$warehouseId) {
                                        return null; // aún no hay datos suficientes para validar
                                    }

                                    $stock = Inventory::where('product_id', $productId)
                                        ->where('warehouse_id', $warehouseId)
                                        ->value('stock') ?? 0;

                                    return "max:$stock";
                                })
                                ->helperText(function (Get $get) {
                                    $productId = $get('product_id');
                                    $warehouseId = $get('../../warehouse_id');

                                    if (!$productId || !$warehouseId) {
                                        return null;
                                    }

                                    $stock = \App\Models\Inventory::where('product_id', $productId)
                                        ->where('warehouse_id', $warehouseId)
                                        ->value('stock') ?? 0;

                                    return "Stock disponible: $stock";
                                })
                                
                                ->reactive(),

                            Placeholder::make('unit_price')
                                ->label('Precio Unitario')
                                ->content(
                                    fn(Get $get): string =>
                                    number_format(
                                        optional(Product::find($get('product_id')))->price ?? 0,
                                        2,
                                        '.',
                                        ''
                                    )
                                ),

                            Placeholder::make('sub_total')
                                ->label('Subtotal')
                                ->content(
                                    fn(Get $get): string =>
                                    number_format(
                                        $get('quantity') * (optional(Product::find($get('product_id')))->price ?? 0),
                                        2,
                                        '.',
                                        ''
                                    )
                                ),
                        ])
                        // Hook que muta el array de datos justo ANTES de crear cada pivot:
                        ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                            $data['subTotal'] = $data['quantity'] * optional(Product::find($data['product_id']))->price;
                            return $data;
                        })
                        // Hook que muta ANTES de guardar cuando editas un registro existente:
                        ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                            $data['subTotal'] = $data['quantity'] * optional(Product::find($data['product_id']))->price;
                            return $data;
                        })
                        ->afterStateUpdated(function (Get $get, Set $set): void {
                            $total = collect($get('orderProducts'))
                                ->sum(
                                    fn($item) =>
                                    $item['quantity']
                                        * (optional(\App\Models\Product::find($item['product_id']))->price ?? 0)
                                );

                            $set('total', $total);
                        }),


                    Hidden::make('total')
                        ->reactive(),

                    Placeholder::make("")
                        ->label('Total')
                        ->columnSpan('full')
                        ->reactive()
                        ->content(
                            fn(Get $get): string =>
                            'Bs. ' . number_format($get('total') ?? 0, 2, '.', '')
                        ),

                ]),

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
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                ->label('Ver')
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
            OrderProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }

    /**
     * Método auxiliar para recalcular el total tras cada cambio
     */
    protected static function recalculateTotal(Get $get, Set $set): void
    {
        $subtotal = collect($get('orderProducts'))
            ->sum(fn($item) => $item['quantity'] * $item['unit_price']);

        $set('total', number_format($subtotal, 2, '.', ''));
    }
}
