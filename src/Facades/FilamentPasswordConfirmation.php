<?php

namespace JulioMotol\FilamentPasswordConfirmation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JulioMotol\FilamentPasswordConfirmation\FilamentPasswordConfirmation
 */
class FilamentPasswordConfirmation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \JulioMotol\FilamentPasswordConfirmation\FilamentPasswordConfirmation::class;
    }
}
