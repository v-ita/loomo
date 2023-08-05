<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            # Product
            'Create product',
            'Update all product',
            'Delete all product',
            'View all product',
            'Update own product',
            'Delete own product',
            'View own product',

            # Cart
            'Create cart',
            'Update all cart',
            'Delete all cart',
            'View all cart',
            'Create own cart',
            'Update own cart',
            'Delete own cart',
            'View own cart',

            # Cart item
            'Create cart item',
            'Update all cart item',
            'Delete all cart item',
            'View all cart item',
            'Create own cart item',
            'Update own cart item',
            'Delete own cart item',
            'View own cart item',

            # Category
            'Create category',
            'Update all category',
            'Delete all category',
            'View all category',

            # Role
            'Create role',
            'Update all role',
            'Delete all role',
            'View all role',

            # Permission role
            'Create permission role',
            'Update all permission role',
            'Delete all permission role',
            'View all permission role',

            # Order
            'Create order',
            'Update all order',
            'Delete all order',
            'View all order',
            'Create own order',
            'Update own order',
            'Delete own order',
            'View own order',

            # Order item
            'Create order item',
            'Update all order item',
            'Delete all order item',
            'View all order item',
            'Create own order item',
            'Update own order item',
            'Delete own order item',
            'View own order item',
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            Permission::create([
                'name' => $permissions[$i],
                'code' => Str::slug($permissions[$i])
            ]);
        }
    }
}
