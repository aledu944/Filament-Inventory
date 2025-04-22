<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;
    protected static ?string $title = 'Gestion de ventas';
    protected static ?string $navigationLabel = 'Custom Navigation Label';
    protected ?string $subheading = 'Custom Page Subheading';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("Nueva venta"),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderWidget::class,
        ];
    }

    public function getExtraBodyAttributes(): array
{
    return [
        'class' => 'settings-page',
    ];
}
}
