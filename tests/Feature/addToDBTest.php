<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addToDBTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $response = $this->post('/admin/add');

        $this->assertDatabaseHas('category', [
            'slug' => 'sport'
        ]);
    }
}
