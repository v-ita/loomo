<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrator',
            'Seller',
            'Client',
        ];

        for ($i = 0; $i < count($roles); $i++) {
            Role::create([
                'name' => $roles[$i],
                'code' => Str::slug($roles[$i])
            ]);
        }
    }
}
