<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get the Super Admin and Admin roles for the Administrator, Staff and Client
        $roleSuperAdmin = Role::whereName('Super-Admin')->get();
        $roleAdmin = Role::whereName('Admin')->get();
        $roleStaff = Role::whereName('Staff')->get();
        $roleClient = Role::whereName('Client')->get();

        // Create Super Admin User and assign the role to him.
        $userAdmin = User::create([
            'id' => 111,
            'name' => 'Administrator',
            'email' => 'super.admin@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userAdmin->assignRole([$roleSuperAdmin]);

        // Create Admin
        $userStudent = User::create([
            'id' => 500,
            'name' => 'Admin1',
            'email' => 'Admin1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userStudent->assignRole([$roleAdmin]);


        // Create Staff
        $userStaff = User::create([
            'id' => 1000,
            'name' => 'Staff1',
            'email' => 'staff1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userStaff->assignRole([$roleStaff]);

        // Create Client
        $userClient = User::create([
            'id' => 2000,
            'name' => 'Client1',
            'email' => 'client1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userClient->assignRole([$roleClient]);

        // Create Guest (unverified user)
        $userGuest = User::create([
            'id' => 3000,
            'name' => 'Dee Mouser',
            'email' => 'dee.mouser@example.com',
            'password' => Hash::make('Password1')
        ]);


        $roleGuest = Role::create(['name' => 'Guest']);
        $roleGuest->givePermissionTo('listing-show');

        $userGuest->assignRole([$roleGuest]);


        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Password1'),
        ]);
    }
}
