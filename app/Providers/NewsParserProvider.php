<?php

namespace App\Providers;

use App\Library\Interfaces\NewsParserInterface;
use App\Library\NewsParser;
use Illuminate\Support\ServiceProvider;

class NewsParserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        // если заменить singleton на bind то будет создаваться разные классы калькулятора!
        $this->app->singleton(NewsParserInterface::class, function ($app) {
            // Если нужно поменя весь класс, то меняем в этом месте название
            // И во всем приложении будет работать
            return new NewsParser();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
