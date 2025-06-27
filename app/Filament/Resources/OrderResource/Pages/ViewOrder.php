<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Placeholder;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    // protected function getFormSchema(): array
    // {
    //     return [
    //         Placeholder::make('user_info')
    //             ->label('Usuario que generó la venta')
    //             ->content(fn () => $this->record->user?->name . ' (' . $this->record->user?->email . ')'),

    //         Placeholder::make('customer_info')
    //             ->label('Cliente')
    //             ->content(fn () => $this->record->customer?->name . ' — ' . $this->record->customer?->phone),

    //         Placeholder::make('total')
    //             ->label('Total de la Orden')
    //             ->content(fn () => number_format($this->record->total, 2) . ' BOB'),
    //     ];
    // }
}
