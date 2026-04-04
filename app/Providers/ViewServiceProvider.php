<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Plan;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Location\Facades\Location;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // This ensures $dbPlans and $isIndia are available in your header
        View::composer('layouts.resume_header', function ($view) {

            // Cache for 1 hour to keep the system fast
            $plans = Cache::remember('pricing_plans', 3600, function () {
                return Plan::where('is_active', 1)->get();
            });

            // Server-side location detection
            $ip = request()->ip();
            // Force a real Indian IP for testing on your local machine
            if (in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.')) {
                $ip = '103.115.197.10'; // Static Guwahati IP for development
            }

            $location = Location::get($ip);
            $isIndia = ($location && $location->countryCode === 'IN');
            $isIndia = 'IN';
            $view->with([
                'country' => $location ? $location->countryName : 'Unknown',
                'dbPlans' => $plans,
                'isIndia' => $isIndia
            ]);
        });
    }
}