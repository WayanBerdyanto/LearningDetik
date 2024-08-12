<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel as User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'userdetik',
            'password' => Hash::make('password'),
            'first_name' => 'User',
            'last_name' => 'DetikCom',
            'email' => 'user@detik.com',
            'gender' => 'male',
            'birth_date' => '2003-01-01',
            'role' => 'user'
        ]);

        User::create([
            'username' => 'admindetik',
            'password' => Hash::make('password'),
            'first_name' => 'Admin',
            'last_name' => 'DetikCom',
            'email' => 'admin@detik.com',
            'gender' => 'male',
            'birth_date' => '2003-01-01',
            'role' => 'admin'
        ]);
    }
}
