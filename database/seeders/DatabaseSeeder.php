<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ObatSeeder::class,
        ]);

        // Tambah user default
        if (!User::where('email', 'raflialfariji@gmail.com')->exists()) {
            User::create([
                'name' => 'rafly',
                'email' => 'raflialfariji@gmail.com',
                'password' => Hash::make('rafly05'),
            ]);
        }
    }
}
