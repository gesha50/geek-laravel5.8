<?php

namespace App\Providers;

use App\Library\Calc;
use App\Library\Interfaces\CalcInterface;
use Illuminate\Support\ServiceProvider;

class CalcProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // если заменить singleton на bind то будет создаваться разные классы калькулятора!
        $this->app->singleton(CalcInterface::class, function ($app) {
            // Если нужно поменя весь класс, то меняем в этом месте название
            // И во всем приложении будет работать
            return new Calc( );
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
