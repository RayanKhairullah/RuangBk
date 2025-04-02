<?php

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "User One",
            "email" => "userone@gmail.com",
            "role" => UserRole::User,
            "password" => Hash::make("password"),
        ]);
    }
}
