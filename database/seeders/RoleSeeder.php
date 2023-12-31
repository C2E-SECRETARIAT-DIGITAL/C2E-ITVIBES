<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;
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

        Filiere::create(['name' => 'SRIT']);
        Filiere::create(['name' => 'SIGL']);
        Filiere::create(['name' => 'RTEL']);
        Filiere::create(['name' => 'TWIN']);
        Filiere::create(['name' => 'DASI']);
        Filiere::create(['name' => 'INFO']);
        Filiere::create(['name' => 'SITW']);
        Filiere::create(['name' => 'BIHAR']);
        Filiere::create(['name' => 'ERISE']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_name' => 'Administrateur'
        ]);
    }
}
