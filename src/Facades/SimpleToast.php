<?php

namespace Laijim\SimpleToast\Facades;

use Illuminate\Support\Facades\Facade;
use Laijim\SimpleToast\SimpleToastServiceProvider;

class SimpleToast extends Facade
{
    /**
     * @see SimpleToastServiceProvider
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simpletoast';
    }
}
