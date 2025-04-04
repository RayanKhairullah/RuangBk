<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected function registerPolicies(): void
    {
        // Register your policies here if needed
    }
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
