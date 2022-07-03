<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'username' => 'admin',
        ])->assignRole('admin');

        User::factory()->create([
            'email' => 'user@test.com'
        ])->assignRole('user');

        Post::factory(30)->create();
    }
}
