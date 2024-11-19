<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;
use App\Models\Category;

class StatsAdminOverview extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::query()->count())
                ->description('All Products from the WebSite')
                ->descriptionIcon(Product::query()->count() > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color(Product::query()->count() > 0 ? 'success' : 'danger')
                ->chart(Product::query()->count() > 0 ? [7, 2, 10, 3, 15, 4, 17] : [7, 2, 10, 3, 15, 4, 17]),
        
            Stat::make('Category', Category::query()->count())
                ->description('All Categories from the WebSite')
                ->descriptionIcon(Category::query()->count() > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color(Category::query()->count() > 0 ? 'success' : 'danger')
                ->chart(Category::query()->count() > 0 ? [7, 2, 10, 3, 15, 4, 17] : [7, 2, 10, 3, 15, 4, 17]),
        ];
        
        
    }
}
