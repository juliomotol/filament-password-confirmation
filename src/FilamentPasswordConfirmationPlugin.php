<?php

namespace JulioMotol\FilamentPasswordConfirmation;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Route;
use JulioMotol\FilamentPasswordConfirmation\Pages\ConfirmPassword;

class FilamentPasswordConfirmationPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-password-confirmation';
    }

    public function register(Panel $panel): void
    {
        // TODO Configure name, path, middleware
        $panel->authenticatedRoutes(fn () => Route::get('confirm', ConfirmPassword::class)->name('confirm'));

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
}
