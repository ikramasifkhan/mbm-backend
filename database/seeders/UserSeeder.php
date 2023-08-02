<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'user-1',
                'mobile' => '01724066642',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'user-2',
                'mobile' => '01724866642',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'user-3',
                'mobile' => '01724078642',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'user-4',
                'mobile' => '017263066642',
                'email' => 'user4@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'user-1',
                'mobile' => '01777066642',
                'email' => 'user5@gmail.com',
                'password' => bcrypt('12345678'),
            ],


        ]);
    }
}
