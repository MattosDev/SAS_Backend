<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
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
        $this->registerApiExceptionHandler();
        
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }

    protected function registerApiExceptionHandler()
    {
        $this->app->bind(ExceptionHandler::class, function ($app) {
            return new class($app) extends \Illuminate\Foundation\Exceptions\Handler {
                public function register()
                {
                    $this->renderable(function (AuthenticationException $e, $request) {
                        if ($request->expectsJson()) {
                            return response()->json(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
                        }
                    });
                }
            };
        });
    }
}
