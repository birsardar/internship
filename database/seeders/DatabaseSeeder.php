<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Seed the users table with sample data
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'username' => 'admin',

            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'), // Use Hash::make() to hash the password
            'user_type' => 'admin'

        ]);
    }
}
