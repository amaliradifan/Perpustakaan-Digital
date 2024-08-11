<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //seed category
        Category::create([
            'name' => 'Novel',
        ]);
        Category::create([
            'name' => 'Science',
        ]);
        Category::create([
            'name' => 'History',
        ]);
        
        //seed user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@perpus.com',
            'password' => bcrypt('password'),
            'role' => 'admin']);
    }
}
