<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // если не видит сидр, то:  composer dump-autoload
        $this->call([
            NewsSeeder::class,
            CategoriesSeeder::class,
            RoleSeeder::class,
            ResourcesSeeder::class
        ]);
    }
}
