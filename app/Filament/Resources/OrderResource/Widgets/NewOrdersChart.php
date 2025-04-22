<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Carbon\Carbon;

class NewOrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Ventas diarias del mes actual';
    protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        // Fecha actual
        $now = Carbon::now();
        // Inicio y fin del mes actual
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth   = $now->copy()->endOfMonth();

        $labels = [];
        $data   = [];

        // Recorremos **cada día** del mes
        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            // Etiqueta: día/mes, e.g. "01/04", "02/04", …
            $labels[] = $date->format('d/m');

            // Suma de ventas para ese día
            $data[] = Order::whereDate('created_at', $date)
                ->sum('total'); // ajusta 'total' al nombre de tu columna
        }

        return [
            'datasets' => [
                [
                    'label' => 'Ventas (€)',
                    'data'  => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
