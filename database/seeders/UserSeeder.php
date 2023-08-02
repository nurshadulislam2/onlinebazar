<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'mobile' => '017',
            'address' => 'dhaka',
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('editor'),
            'mobile' => '016',
            'address' => 'dhaka',
            'is_admin' => 2
        ]);

        User::create([
            'name' => 'writer',
            'email' => 'writer@gmail.com',
            'password' => Hash::make('writer'),
            'mobile' => '015',
            'address' => 'dhaka',
            'is_admin' => 3
        ]);
    }
}
