<?php

namespace JulioMotol\FilamentPasswordConfirmation;

use Filament\Panel;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Arr;
use LogicException;

/** @property-read string|array $routeMiddleware */
trait RequiresPasswordConfirmation
{
    protected static ?int $passwordTimeout = null;

    public static function getRouteMiddleware(Panel $panel): string | array
    {
        $plugin = $panel->getPlugin('filament-password-confirmation');

        if (! $plugin instanceof FilamentPasswordConfirmationPlugin) {
            throw new LogicException('`FilamentPasswordConfirmationPlugin` is not registered in current `PanelProvider`');
        }

        return [
            RequirePassword::using(
                $plugin->getPasswordConfirmationRouteName(),
                static::$passwordTimeout  ?? $plugin->getPasswordTimeout() ?? config('auth.password_timeout')
            ),
            ...Arr::wrap(static::$routeMiddleware),
        ];
    }
}
