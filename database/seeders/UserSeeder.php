<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'DinhTrang',
                'email' => 'dinhngoctrang1203@gmail.com',
                'password' => bcrypt('12345689'),
                'role' => 1,
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'HongThu',
                'email' => 'vohongthu2002@gmail.com',
                'password' => bcrypt('12345689'),
                'role' => 2,
                'status' => 1,
            ]
        ]);
    }
}
