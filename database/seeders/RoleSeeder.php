<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'student']);

        // Assign a role to a user (for example, user with ID 1)
        $user = User::find(1);
        $user->assignRole('admin'); // Assign the 'admin' role
    }
}
