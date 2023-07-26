<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // admin
        User::create(
            [
                'name' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@loomo.com',
                'password' => bcrypt('admin'),
            ],
        );
    }
}
