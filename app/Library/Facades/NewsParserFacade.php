<?php


namespace App\Library\Facades;


use App\Library\Interfaces\NewsParserInterface;

class NewsParserFacade  extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return NewsParserInterface::class;
    }
}
