<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@tuanldas.me')->exists()) {
            User::factory()->create([
                'email' => 'admin@tuanldas.me'
            ]);
        }
    }
}
