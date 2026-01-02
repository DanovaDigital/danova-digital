<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
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
        // Share site settings to all views
        View::composer('*', function ($view) {
            $view->with('siteSettings', [
                'header_logo' => SiteSetting::getValue('branding.header_logo'),
                'hero_showcase_logo' => SiteSetting::getValue('hero.showcase_logo'),
                'badge_avatar_1' => SiteSetting::getValue('hero.badge_avatar1'),
                'badge_avatar_2' => SiteSetting::getValue('hero.badge_avatar2'),
                'badge_avatar_3' => SiteSetting::getValue('hero.badge_avatar3'),
            ]);
        });
    }
}
