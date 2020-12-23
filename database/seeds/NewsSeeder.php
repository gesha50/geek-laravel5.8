<?php

use Illuminate\Database\Seeder;
//use DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = factory(\App\Models\News::class, 5)->create();
    }
}
