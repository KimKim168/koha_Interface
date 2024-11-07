<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteInfo;
use App\Models\Database;
use App\Models\Footer;
use App\Models\Link;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share([
            'websiteInfo' => WebsiteInfo::first() ?: new WebsiteInfo,
            'menu_databases' => Database::where('status', 1)->orderBy('order_index', 'ASC')->get(),
            'footer' => Footer::first() ?: new Footer,
            'links' => Link::orderBy('order_index', 'ASC')->get(),
        ]);
    }

}
