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
    public function testExample()
    {
        $maxCategoryId = Category::getMaxId();
        $data = [
            'category_id' => rand(1,$maxCategoryId),
            'image' => '',
            'is_private' => 1,
            'title' => $this->faker->sentence(rand(3,5)),
            'spoiler' => $this->faker->text(rand(200,220)),
            'description' => $this->faker->text(rand(1000,2000))
        ];

        $response = $this->post('/admin/news/add', $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('news', $data);
    }
}
