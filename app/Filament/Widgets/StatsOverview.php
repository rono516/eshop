<?php
namespace App\Filament\Widgets;

use App\Services\StatsService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $stats = app(StatsService::class)->getOverview();
        return [
            Stat::make('Orders', $stats["orders"]),
            Stat::make('Payments', 'KES ' . $stats["payments"]),
            Stat::make('Product In Stock', $stats["stock"]),
            Stat::make('Sales', 'KES ' . $stats["sales"]),
        ];
    }
}
