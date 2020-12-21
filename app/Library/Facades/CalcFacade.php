<?php

namespace App\Library\Facades;

use App\Library\Interfaces\CalcInterface;

class CalcFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CalcInterface::class;
        //return 'orchestra.parser.xml';
    }
}
