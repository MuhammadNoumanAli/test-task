<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'list permission']);
        Permission::create(['name' => 'add role']);
        Permission::create(['name' => 'edit permission']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('list users');
        $role2->givePermissionTo('add users');
        $role2->givePermissionTo('view user');
        $role2->givePermissionTo('edit users');
        $role2->givePermissionTo('delete users');

        $role2->givePermissionTo('list permission');
        $role2->givePermissionTo('add role');
        $role2->givePermissionTo('edit permission');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);
    }
}
