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
        Role::create([
            'guard_name' => 'api',
            'name' => 'ADMIN']
        );
        Role::create([
            'guard_name' => 'api',
            'name' => 'TEACHER'
        ]);
        Role::create([
            'guard_name' => 'api'
            ,'name' => 'STUDENT'
        ]);
    }
}
