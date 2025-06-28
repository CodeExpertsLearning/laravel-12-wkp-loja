<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Payments\PaymentInterface::class,
            \App\Services\Payments\HappyPayment::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('can_access_manager', fn(User $user) => $user->isAdmin());

        Blade::directive('cartcount', function (string $expression) {
            return "<?php if(count($expression)): ?>";
        });

        Blade::directive('endcartcount', function (string $expression) {
            return '<?php endif; ?>';
        });
    }
}
