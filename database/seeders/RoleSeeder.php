<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);


        $permission_read = Permission::create(['name' => 'read articles']);
        $permission_edit = Permission::create(['name' => 'edit articles']);
        $permission_write = Permission::create(['name' => 'write articles']);
        $permission_delete = Permission::create(['name' => 'delete articles']);

        $permission_admin = [
            $permission_read,
            $permission_edit,
            $permission_write,
            $permission_delete
        ];

        //giving multiple permissions to a user
        $role_admin->syncPermissions($permission_admin);

        //giving a single permission to a user
        $role_standard->givePermissionTo($permission_read);

        // $permission->syncRoles($roles);
    }
}
