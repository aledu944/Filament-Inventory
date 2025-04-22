<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderWidget extends BaseWidget
{
    protected function getStats(): array
    {

        $ordershismonth = Order::whereMonth('created_at', now()->month)->count();
        $newClients = Customer::whereMonth('created_at', now()->month)->count();
        $totalProducts = Product::whereMonth('created_at', now()->month)->count();

        return [
            Stat::make('Nuevas ventas', $ordershismonth)
                ->description("Ventas generadas este mes")
                ->color("success")
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->chart([7, 0, 10, 3, 15, 4, 0]),
            Stat::make('Nuevos clientes', $newClients)
                ->description("Clientes registrados este mes")
                ->color("success")
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->chart([7, 0, 10, 3, 15, 4, 0]),
            Stat::make('Productos vendidos', $totalProducts)
                ->description("Productos vendidos este mes")
                ->color("success")
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->chart([7, 0, 10, 3, 15, 4, 0]),
        ];
    }
}
