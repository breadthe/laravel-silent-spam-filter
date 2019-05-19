<?php

namespace Breadthe\LaravelSilentSpamFilter;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Breadthe\LaravelSilentSpamFilter\Skeleton\SkeletonClass
 */
class LaravelSilentSpamFilterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-silent-spam-filter';
    }
}
