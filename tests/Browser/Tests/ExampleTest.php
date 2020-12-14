<?php

namespace Tests\Browser;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     * @test
     * @return void
     */
    public function testBasicExample()
    {
        $news = factory(News::class)->state('withCategoryID')->create();
//        dump(app()->environment());
//        dump(\DB::connection()->getName());
//        dd(\DB::connection()->getDatabaseName());
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Главная')
                    ->screenshot('Проверка');
        });
    }
}
