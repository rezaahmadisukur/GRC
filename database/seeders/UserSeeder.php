<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Owner Rental',
            'username' => 'owner123', // Ini buat login nanti
            'password' => Hash::make('password123'), // Jangan lupa di-hash!
            'role' => 'owner',
            'is_active' => true,
        ]);
    }
}
