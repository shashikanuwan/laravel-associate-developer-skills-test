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
            'password' => '$2y$10$Am94MmiA/JFXTz/wFWbxxugHud2IAusQ0dxllVU8j3kZg5dfUJynO'
        ])->assignRole(Role::ROLE_ADMIN);
    }
}
