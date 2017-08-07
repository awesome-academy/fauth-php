<?php

namespace Framgia\Fauth\Contracts;

interface Factory
{
    /**
     * Get an OAuth provider implementation.
     *
     * @param  string  $driver
     * @return \Framgia\FAuth\Contracts\Provider
     */
    public function driver($driver = null);
}
