<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $role = [
        ['id' => 1, 'role' => 'admin'],
        ['id' => 2, 'role' => 'user'],
        ['id' => 3, 'role' => 'guest'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            \DB::table('role')->insert($this->role);
    }
}
