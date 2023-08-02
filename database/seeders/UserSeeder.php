<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    protected $i=0;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'user-'.$this->i= $this->i+1,
                'mobile'=>'01724066642',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('12345678'),
            ],

            [
                'name'=>'user-'.$this->i= $this->i+1,
                'mobile'=>'01937302480',
                'email'=>'user02@gmail.com',
                'password'=>bcrypt('12345678'),
            ],
        ]);
    }
}
