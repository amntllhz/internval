<?php

namespace App\Providers;

use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;
use Filament\Support\Facades\FilamentColor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        FilamentColor::register([        
            'success' => '#58CC02',            
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        FilamentView::registerRenderHook(
            // Ini menempatkan tautan tepat setelah formulir dan tombol Sign In
            'panels::auth.login.form.after',
            fn (): View => view('filament.custom-login-link'),
        );
    }
}
