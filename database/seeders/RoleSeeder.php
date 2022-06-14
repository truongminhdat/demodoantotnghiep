<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'description' => 'Administrator'
            ],
            [
                'id' => 2,
                'name' => 'User',
                'description' => 'User'
            ],
        ]);
    }
}
