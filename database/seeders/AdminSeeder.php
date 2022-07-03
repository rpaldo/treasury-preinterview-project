<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$ESPcwIj1yhEFjvIUex9Fn.kI.GDV3cE.MRS8pNnoO0Z3u6u48mQSS', //password
        ])->assignRole('admin');
    }
}
