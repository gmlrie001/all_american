<?php

namespace Templates\AllAmerican\Facades;

// Illuminate Facades
use Illuminate\Support\Facades\Facade;


class AllAmerican extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'all_american';
    }

}
