<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Administrateur']);
        Role::create(['name' => 'Caissière']);
        Role::create(['name' => 'Scaneur']);


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_name' => 'Administrateur'
        ]);
    }
}
