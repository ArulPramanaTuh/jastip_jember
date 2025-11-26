<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'arulramana10@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
        ]);
    }
}
