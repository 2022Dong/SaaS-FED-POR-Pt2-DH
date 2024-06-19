<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{

    private $permissions = [
        'role-assign',    'role-revoke',
        'role-list',      'role-show',      'role-create',     'role-edit',      'role-delete',
        'user-browse',    'user-show',      'user-edit',        'user-add',       'user-delete',
        'user-trash-recover',     'user-trash-remove',      'user-trash-empty',       'user-trash-restore',
        'listing-browse',     'listing-show',   'listing-edit',     'listing-add',    'listing-delete',
        'listing-trash-recover',      'listing-trash-remove',   'listing-trash-empty',     'listing-trash-restore',
        'members',
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // Create each of the permissions ready for role creation
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Generate the Super-Admin Role
        $roleSuperAdmin = Role::create(['name' => 'Super-Admin']);
        $permissionsAll = Permission::pluck('id', 'id')->all();
        $roleSuperAdmin->syncPermissions($permissionsAll);

        // Generate the Admin Role
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->givePermissionTo('user-browse');
        $roleAdmin->givePermissionTo('user-show');
        $roleAdmin->givePermissionTo('user-edit');
        $roleAdmin->givePermissionTo('user-add');
        $roleAdmin->givePermissionTo('user-delete');
        $roleAdmin->givePermissionTo('user-trash-recover');
        $roleAdmin->givePermissionTo('user-trash-remove');
        $roleAdmin->givePermissionTo('user-trash-empty');
        $roleAdmin->givePermissionTo('user-trash-restore');
        $roleAdmin->givePermissionTo('listing-browse');
        $roleAdmin->givePermissionTo('listing-show');
        $roleAdmin->givePermissionTo('listing-edit');
        $roleAdmin->givePermissionTo('listing-delete');
        $roleAdmin->givePermissionTo('listing-trash-recover');
        $roleAdmin->givePermissionTo('listing-trash-remove');
        $roleAdmin->givePermissionTo('listing-trash-empty');
        $roleAdmin->givePermissionTo('listing-trash-restore');
        $roleAdmin->givePermissionTo('role-assign');
        $roleAdmin->givePermissionTo('role-revoke');
        $roleAdmin->givePermissionTo('role-list');
        $roleAdmin->givePermissionTo('role-show');
        $roleAdmin->givePermissionTo('role-create');
        $roleAdmin->givePermissionTo('role-edit');
        $roleAdmin->givePermissionTo('role-delete');
        $roleAdmin->givePermissionTo('members');

        // Generate the Staff role
        $roleStaff = Role::create(['name' => 'Staff']);
        $roleStaff->givePermissionTo('user-browse');
        $roleStaff->givePermissionTo('user-show');
        $roleStaff->givePermissionTo('user-add');
        $roleStaff->givePermissionTo('user-delete');
        $roleStaff->givePermissionTo('listing-browse');
        $roleStaff->givePermissionTo('listing-show');
        $roleStaff->givePermissionTo('listing-edit');
        $roleStaff->givePermissionTo('listing-delete');
        $roleStaff->givePermissionTo('listing-trash-recover');
        $roleStaff->givePermissionTo('listing-trash-remove');
        $roleStaff->givePermissionTo('members');

        // Generate the Client role
        $roleClient = Role::create(['name' => 'Client']);
        $roleClient->givePermissionTo('listing-browse');
        $roleClient->givePermissionTo('listing-show');
        $roleClient->givePermissionTo('listing-edit');
        $roleClient->givePermissionTo('listing-add');
        $roleClient->givePermissionTo('listing-delete');
        $roleClient->givePermissionTo('listing-trash-recover');
        $roleClient->givePermissionTo('listing-trash-remove');
        $roleClient->givePermissionTo('listing-trash-empty');
        $roleClient->givePermissionTo('listing-trash-restore');
        $roleClient->givePermissionTo('members');

        // Create Guest (unverified user)
        $roleGuest = Role::create(['name' => 'Guest']);
        $roleGuest->givePermissionTo('listing-browse');
        $roleGuest->givePermissionTo('listing-show');
        $roleGuest->givePermissionTo('members');
    }
}
