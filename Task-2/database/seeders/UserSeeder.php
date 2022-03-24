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
            'password' => '654321'
        ])->assignRole(Role::ROLE_ADMIN);
    }
}
