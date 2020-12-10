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

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Главная')
                    ->screenshot('Проверка');
        });
    }
}
