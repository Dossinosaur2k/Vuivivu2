<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Role;

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
                'name' => 'Super admin',
            ],
            [
                'id' => 2,
                'name' => 'Administrator',
            ]
        ]);
    }
}
