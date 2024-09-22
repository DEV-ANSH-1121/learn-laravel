<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Ansh Suman',
            'email' => 'ansh@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $roles = [
            'Admin',
            'Sub Admin',
            'Customer'
        ];

        foreach($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }
    }
}
