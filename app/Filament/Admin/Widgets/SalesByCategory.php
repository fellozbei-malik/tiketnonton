<?php

namespace App\Filament\Admin\Widgets;

use App\Models\EventCategory;
use App\Models\Order;
use Filament\Widgets\ChartWidget;

class SalesByCategory extends ChartWidget
{
    protected static ?string $heading = 'Sales by Event Category';

    protected static ?int $sort = 7;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $categories = EventCategory::with(['events.tickets.orderItems.order'])
            ->get()
            ->map(function ($category) {
                $totalSales = 0;
                
                foreach ($category->events as $event) {
                    foreach ($event->tickets as $ticket) {
                        $totalSales += $ticket->orderItems()
                            ->whereHas('order', function ($query) {
                                $query->where('status', 'paid');
                            })
                            ->sum('price');
                    }
                }
                
                return [
                    'name' => $category->name,
                    'sales' => $totalSales,
                ];
            })
            ->sortByDesc('sales')
            ->take(10);

        return [
            'datasets' => [
                [
                    'label' => 'Sales (Rp)',
                    'data' => $categories->pluck('sales')->toArray(),
                    'backgroundColor' => [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                        'rgba(34, 197, 94, 0.8)',
                        'rgba(251, 146, 60, 0.8)',
                        'rgba(99, 102, 241, 0.8)',
                        'rgba(168, 85, 247, 0.8)',
                    ],
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
