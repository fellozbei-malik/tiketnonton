<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use App\Models\PartnerRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalRevenue = Order::where('status', 'paid')->sum('total_amount');
        $totalOrders = Order::where('status', 'paid')->count();
        $totalEvents = Event::count();
        $totalUsers = User::count();
        $pendingPartnerRequests = PartnerRequest::where('status', 'pending')->count();
        $upcomingEvents = Event::where('start_time', '>', now())->count();

        // Calculate revenue growth (last 30 days vs previous 30 days)
        $currentMonthRevenue = Order::where('status', 'paid')
            ->whereBetween('created_at', [now()->subDays(30), now()])
            ->sum('total_amount');
        
        $previousMonthRevenue = Order::where('status', 'paid')
            ->whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])
            ->sum('total_amount');
        
        $revenueGrowth = $previousMonthRevenue > 0 
            ? (($currentMonthRevenue - $previousMonthRevenue) / $previousMonthRevenue) * 100 
            : 0;

        // Calculate order growth
        $currentMonthOrders = Order::where('status', 'paid')
            ->whereBetween('created_at', [now()->subDays(30), now()])
            ->count();
        
        $previousMonthOrders = Order::where('status', 'paid')
            ->whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])
            ->count();
        
        $orderGrowth = $previousMonthOrders > 0 
            ? (($currentMonthOrders - $previousMonthOrders) / $previousMonthOrders) * 100 
            : 0;

        return [
            Stat::make('Total Revenue', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description($revenueGrowth > 0 ? '+' . number_format($revenueGrowth, 1) . '% from last month' : number_format($revenueGrowth, 1) . '% from last month')
                ->descriptionIcon($revenueGrowth > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueGrowth > 0 ? 'success' : 'danger')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3, 8, 9, 10, 12]),
            
            Stat::make('Total Orders', number_format($totalOrders))
                ->description($orderGrowth > 0 ? '+' . number_format($orderGrowth, 1) . '% from last month' : number_format($orderGrowth, 1) . '% from last month')
                ->descriptionIcon($orderGrowth > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($orderGrowth > 0 ? 'success' : 'danger')
                ->chart([5, 10, 7, 12, 8, 15, 10, 13, 9, 14, 11, 16]),
            
            Stat::make('Total Events', number_format($totalEvents))
                ->description($upcomingEvents . ' upcoming events')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info')
                ->chart([2, 3, 4, 3, 5, 4, 6, 5, 7, 6, 8, 7]),
            
            Stat::make('Total Users', number_format($totalUsers))
                ->description('Registered customers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart([10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65]),
            
            Stat::make('Partner Requests', number_format($pendingPartnerRequests))
                ->description('Pending review')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->url(route('filament.admin.resources.partner-requests.index')),
            
            Stat::make('This Month', 'Rp ' . number_format($currentMonthRevenue, 0, ',', '.'))
                ->description('Revenue in last 30 days')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
        ];
    }
}
