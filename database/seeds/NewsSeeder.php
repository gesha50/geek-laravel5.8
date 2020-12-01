<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0;$i<10;$i++){
            $data[] = [
                'category_id' => rand(1,5),
                'image' => '',
                'is_private' => rand(0,1),
                'title' => $faker->sentence(rand(3,5)),
                'spoiler' => $faker->text(rand(300,400)),
                'description' => $faker->text(rand(1000,2000))
            ];
        }
        return $data;
    }
}
