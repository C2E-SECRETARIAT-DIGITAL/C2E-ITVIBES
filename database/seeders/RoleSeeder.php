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



        Filiere::create(['name' => 'MP2I']);


        Filiere::create(['name' => 'RTEL 2']);
        Filiere::create(['name' => 'RTEL 3']);


        Filiere::create(['name' => 'SRIT 1A']);
        Filiere::create(['name' => 'SRIT 1B']);
        Filiere::create(['name' => 'SRIT 1C']);
        Filiere::create(['name' => 'SRIT 1D']);

        Filiere::create(['name' => 'SRIT 2A']);
        Filiere::create(['name' => 'SRIT 2B']);

        Filiere::create(['name' => 'SRIT 3A']);
        Filiere::create(['name' => 'SRIT 3B']);


        Filiere::create(['name' => 'SIGL 2']);
        Filiere::create(['name' => 'SIGL 3']);


        Filiere::create(['name' => 'TWIN 1']);
        Filiere::create(['name' => 'TWIN 2']);
        Filiere::create(['name' => 'TWIN 3']);

        Filiere::create(['name' => 'DASI']);
        Filiere::create(['name' => 'BIHAR']);
        Filiere::create(['name' => 'ERIS']);
        Filiere::create(['name' => 'INFO']);
        Filiere::create(['name' => 'MBDS']);
        Filiere::create(['name' => 'RTEL (master)']);
        Filiere::create(['name' => 'SITW']);
        Filiere::create(['name' => 'SIGL (master)']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_name' => 'Administrateur'
        ]);
    }
}
