<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'guard_name' => 'api',
            'name' => 'SHOW'
        ]);
        Permission::create([
            'guard_name' => 'api',
            'name' => 'WRITE'
        ]);
        permission::create([
            'guard_name' => 'api',
            'name' => 'DELETE'
        ]);

        $role1 = Role::find(1); // Admin
        $role2 = Role::find(2); // Teacher
        $role3 = Role::find(3); // Stundet

        $role1->syncPermissions(['SHOW','WRITE','DELETE']);
        $role2->syncPermissions(['SHOW','WRITE','DELETE']);
        $role3->syncPermissions(['SHOW','WRITE']);
    }
}
