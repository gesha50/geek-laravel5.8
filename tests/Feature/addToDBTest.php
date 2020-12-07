<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addToDBTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddToDB()
    {
        $data = factory(\App\Models\News::class)->make()->toArray();

        $response = $this->post(route('admin.news.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('news', $data);
    }

    public function testEditNewsCorrectInDB()
    {
       $news = factory(\App\Models\News::class)->create()->toArray();
        dump($news);

       $response = $this->patch(route('admin.news.update', $news), $news);
       $response->assertStatus(302);
       $this->assertDatabaseHas('news', $news);
    }
}
