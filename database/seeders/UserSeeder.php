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
        // get the Super Admin and Admin roles for the Administrator, Lecturer and Student
        $roleSuperAdmin = Role::whereName('Super-Admin')->get();
        $roleAdmin = Role::whereName('Admin')->get();
        $roleStaff = Role::whereName('Staff')->get();
        $roleClient = Role::whereName('Client')->get();
        $roleMember = Role::whereName('Member')->get();
        $roleGuest = Role::whereName('Guest')->get();

        // Create Super Admin User and assign the role to him.
        $userAdmin = User::create([
            'id' => 111,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userAdmin->assignRole([$roleSuperAdmin]);

        // Create Admin
        $userAdmin = User::create([
            'id' => 501,
            'name' => 'Admin1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userAdmin->assignRole([$roleAdmin]);

        // Create Staff
        $userStaff = User::create([
            'id' => 600,
            'name' => 'Staff1',
            'email' => 'staff1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userStaff->assignRole([$roleStaff]);

        // Create Client
        $useClient = User::create([
            'id' => 700,
            'name' => 'Client1',
            'email' => 'client1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $useClient->assignRole([$roleClient]);

        // Create Member
        $userMember = User::create([
            'id' => 502,
            'name' => 'Member1',
            'email' => 'member1@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userMember->assignRole([$roleMember]);


        // Create Guest (unverified user)
        $userGuest = User::create([
            'id' => 1000,
            'name' => 'Dee Mouser',
            'email' => 'dee.mouser@example.com',
            'password' => Hash::make('Password1')
        ]);
        $userGuest->assignRole([$roleGuest]);


        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Password1'),
        ]);
    }
}
