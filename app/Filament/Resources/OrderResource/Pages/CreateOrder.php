<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id(); // Asignar el usuario logueado
        dd(collect($data));
        $data['total'] = collect($data['orderProducts'] ?? [])
            ->sum(fn($item) => $item['subTotal'] ?? 0);

        return $data;
    }
}
