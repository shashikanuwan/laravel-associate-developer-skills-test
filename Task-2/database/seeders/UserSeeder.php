<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@wearedesigners.net',
            'password' => '$2y$10$8J6c08tXzpBnU4/S3SKiceXe2mB9c.J/6gsjgx8SPvkjm3EqIcQo6' //'654321'
        ])->assignRole(Role::ROLE_ADMIN);
    }
}
