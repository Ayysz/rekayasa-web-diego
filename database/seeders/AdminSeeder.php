<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@diegodessert.com'],
            [
                'name' => 'Admin Diego',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
