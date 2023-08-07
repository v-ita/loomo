<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # Admin can do everything
        $allPermissions = Permission::all();
        foreach ($allPermissions as $permission) {
            $permissionRole = new PermissionRole();
            $adminRole = Role::where('code', str('Administrator')->slug())->first();
            $permissionRole->role()->associate($adminRole);
            $permission->permissionRoles()->save($permissionRole);
        }

        $permissionRoles = [
            'Seller' => [],
            'Client' => [],
        ];

        foreach ($permissionRoles as $key => $value) {
            $permissionRole = new PermissionRole();
            $role = Role::where('code', str($key)->slug())->first();
            $permissionRole->role()->associate($role);
            for ($j = 0; $j < count($value); $j++) {
                $permission = Permission::where('code', str($value[$j])->slug())->first();
                $permission->permissionRoles()->save($permissionRole);
            }
        }
    }
}
