<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    // в массивах $categories и $slug должно быть одинаковое количество!
    protected $categories = ['Спорт', 'Образование', 'Отдых', 'Пандемия', 'Политика'];
//    public $slug = ['sport', 'education', 'rest', 'pandemic', 'politics'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<count($this->categories);$i++){
            $arr = ['title' => $this->categories[$i], 'slug' => Str::slug($this->categories[$i])];
            \DB::table('category')->insert($arr);
        }
    }
}
