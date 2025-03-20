<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();


        
        Route::middleware(['web']) // تطبيق Middleware هنا
        ->group(base_path('routes/web.php'));

        Route::middleware('web')
        ->group(base_path('routes/driver.php'));

        Route::middleware(['web','auth', 'role:admin']) // تطبيق Middleware هنا
        ->prefix('admin')
        ->as('admin.')
        ->group(base_path('routes/admin.php'));
        
 


    }
}
