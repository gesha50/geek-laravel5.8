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
        $data = factory(\App\Models\News::class)->state('withCategoryID')->make()->toArray();
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('news', $data);
    }

    public function testEditNewsCorrectInDB()
    {
       $news = factory(\App\Models\News::class)->state('withCategoryID')->create();

        $newTitle = $this->faker->sentence(rand(3,10));
        $newSpoiler = $this->faker->text(rand(100,300));
        $data =  [
        'category_id' => 1,   // rand(1, $maxCategoryId)
//        'image' => "",
        'is_private' => rand(0,1),
        'title' => $newTitle,
        'spoiler' => $newSpoiler,
        'description' => $news->description
        ];

        $response = $this->patch(route('admin.news.update', $news), $data);

       $response->assertStatus(302);

        $this->assertDatabaseMissing('news', $news->toArray());

        $this->assertDatabaseHas('news', $data);
    }
}
