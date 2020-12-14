<?php

namespace Tests\Browser\Tests;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class AdminNewsDuskTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @return void
     * @throws Throwable
     */
    public function testAdminEditNews()
    {
        $news = factory(News::class)->state('withCategoryID')->create();
        $this->browse(function (Browser $browser) use ($news) {
            $browser->visit(route('admin.news.edit', $news))
                ->assertSee('Редактировать Новость')
                ->screenshot('01-редактирование')
                    ->type('@title', 'Привет из Даска')
                    ->clear('@spoiler')
                    ->screenshot('02-редактирование')
                    ->press('@submit')
                    ->pause(1000)
                    ->screenshot('03-редактирование')
                    ->assertSee('Поле Краткое описание обязательно для заполнения')
                    ->type('@spoiler', 'Текст заполнен из Даска')
                    ->press('@submit')
                    ->waitForText('Новости')
                    ->screenshot('04-редактирование')
            ;
        });
    }
}
