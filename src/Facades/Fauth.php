<?php

namespace Framgia\Fauth\Facades;

use Illuminate\Support\Facades\Facade;
use Framgia\Fauth\Contracts\Factory;

/**
 * @see \Framgia\Fauth\FAuthManager
 */
class Fauth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}
