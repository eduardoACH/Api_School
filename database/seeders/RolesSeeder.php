<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'ADMIN']);
        $role = Role::create(['name' => 'TEACHER']);
        $role = Role::create(['name' => 'STUDENT']);
    }
}
