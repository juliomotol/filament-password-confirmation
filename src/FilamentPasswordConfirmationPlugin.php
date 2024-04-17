<?php

namespace JulioMotol\FilamentPasswordConfirmation;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Route;
use JulioMotol\FilamentPasswordConfirmation\Pages\ConfirmPassword;

class FilamentPasswordConfirmationPlugin implements Plugin
{
    protected string $routeName = 'confirm';

    protected string $routeUri = 'auth/confirm';

    protected string | array | null $routeMiddleware = null;

    public function getId(): string
    {
        return 'filament-password-confirmation';
    }

    public function register(Panel $panel): void
    {
        $panel->authenticatedRoutes(
            fn () => Route::middleware($this->routeMiddleware)->get($this->routeUri, ConfirmPassword::class)
                ->name($this->routeName)
        );

        $panel->macro('getPasswordConfirmationRouteName', fn () => $panel->generateRouteName('confirm'));
    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function routeName(string $routeName): self
    {
        $this->routeName = $routeName;

        return $this;
    }

    public function routeUri(string $routeUri): self
    {
        $this->routeUri = $routeUri;

        return $this;
    }

    public function routeMiddleware(string | array | null $routeMiddleware): self
    {
        $this->routeMiddleware = $routeMiddleware;

        return $this;
    }
}
