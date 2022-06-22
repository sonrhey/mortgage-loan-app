<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::insert([
          [
            "name" => "Admin"
          ],
          [
            "name" => "User"
          ]
        ]);

        User::insert([
          [
            "name" => "Administrator",
            "email" => "admin@mailinator.com",
            "password" => bcrypt("Default@123"),
            "user_type_id" => 1
          ]
        ]);
    }
}
