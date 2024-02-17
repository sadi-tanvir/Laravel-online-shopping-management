<?php

namespace Database\Seeders;

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
        DB::table("users")->insert([
            [
                "name"=> "Tanvir Hossain Sadi",
                "email" => "admin@gmail.com",
                "password" => bcrypt('123'),
                "role" => "admin",
            ],
            [
                "name"=> "Tahmid Hossain Sami",
                "email" => "sami@gmail.com",
                "password" => bcrypt('123'),
                "role" => "user",
            ]
            ]);
    }
}
