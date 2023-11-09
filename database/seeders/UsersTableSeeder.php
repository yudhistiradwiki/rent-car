<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'address' => 'Jl Veteran',
            'phone' => '089627286733',
            'license_number' => '089627286733',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
        ]);
    }
}
