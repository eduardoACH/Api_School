<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name'  => 'Eduardo Avila',
            'email' => 'eduardoavilach@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
        ]);
        $user->assignRole('ADMIN');

    }
}
