<?php

namespace JulioMotol\FilamentPasswordConfirmation;

use Filament\Panel;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Arr;

/** @property-read string|array $routeMiddleware */
trait RequiresPasswordConfirmation
{
    protected static ?int $passwordTimeout = null;

    public static function getRouteMiddleware(Panel $panel): string | array
    {
        return [
            RequirePassword::using($panel->getPasswordConfirmationRouteName(), static::$passwordTimeout),
            ...Arr::wrap(static::$routeMiddleware),
        ];
    }
}
