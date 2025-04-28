<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrapFive();

        $topUsers = Cache::remember('top_users', now()->addMinutes(5), function () {
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->take(3)
                ->get();
        });
        View::share('topUsers', $topUsers);

        // View::share('topUsers', User::withCount('ideas')
        //     ->orderBy('ideas_count', 'DESC')
        //     ->take(3)
        //     ->get());
    }
}
