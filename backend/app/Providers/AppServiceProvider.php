<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Spatie\Backup\Events\BackupHasFailed;
use Illuminate\Support\Facades\Event;

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
        //
        Event::forget(BackupHasFailed::class);
    }
}
