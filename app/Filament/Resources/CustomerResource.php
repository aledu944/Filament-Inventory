<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Filament\Resources\CustomerResource\RelationManagers\OrdersRelationManager;
use App\Models\Customer;
use Filament\Forms;
// use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationGroup = 'CRM';
    protected static ?string $navigationLabel = 'Clientes';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informacion del cliente')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nombre'),
                        TextEntry::make('email')
                            ->label('Correo Electrónico'),
                        TextEntry::make('phone')
                            ->label('Teléfono'),
                        TextEntry::make('nit')
                            ->label('NIT'),
                        TextEntry::make('is_active')
                            ->label("Estado")
                            ->formatStateUsing(fn(bool $state): string => $state ? 'Activo' : 'Inactivo'),
                    ])->columns(2),

                Section::make('Ventas')
                    ->schema([
                        TextEntry::make('orders_count')
                            ->label('Cantidad de Ventas')
                            ->formatStateUsing(fn(int $state): string => (string) $state),
                        TextEntry::make('total_sales')
                            ->label('Total Ventas')
                            ->money('BOB'),
                    ]),
            
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion del cliente')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->unique("customers", "phone")
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('nit')
                            ->numeric()
                            ->unique("customers", "nit")
                            ->required(),
                        Toggle::make('is_active')
                            ->label("Estado"),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nit')
                    ->searchable(),
                TextColumn::make('is_active')
                    ->badge()
                    ->label('Estado')
                    ->formatStateUsing(fn(bool $state): string => $state ? 'Activo' : 'Inactivo')
                    ->color(fn(bool $state): string => $state ? 'success' : 'danger'),
            ])
            ->filters([
                //
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
            OrdersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            'view' => Pages\ViewCustomer::route('/{record}'),
        ];
    }
}
