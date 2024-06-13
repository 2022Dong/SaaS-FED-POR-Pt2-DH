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
        'user-browse', 'user-show', 'user-edit', 'user-add', 'user-delete',
        'user-trash-recover', 'user-trash-remove', 'user-trash-empty', 'user-trash-restore',
        'listing-browse', 'listing-show', 'listing-edit', 'listing-add', 'listing-delete',
        'listing-trash-recover', 'listing-trash-remove', 'listing-trash-empty', 'listing-trash-restore',
        'role-assign', 'role-revoke', 'role-list', 'role-show', 'role-create', 'role-edit', 'role-delete'
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
        $roleAdmin->givePermissionTo([
            'user-browse', 'user-show', 'user-edit', 'user-add', 'user-delete',
            'user-trash-recover', 'user-trash-remove', 'user-trash-empty', 'user-trash-restore',
            'listing-browse', 'listing-show', 'listing-edit', 'listing-delete',
            'listing-trash-recover', 'listing-trash-remove', 'listing-trash-empty', 'listing-trash-restore',
            'role-assign', 'role-revoke', 'role-list', 'role-show', 'role-create', 'role-edit', 'role-delete'
        ]);

        // Generate the Staff role
        $roleStaff = Role::create(['name' => 'Staff']);
        $roleStaff->givePermissionTo([
            'user-browse', 'user-show', 'user-edit', 'user-add', 'user-delete',
            'listing-browse', 'listing-show', 'listing-edit', 'listing-delete',
            'listing-trash-recover', 'listing-trash-remove'
        ]);

        // Generate the Client role
        $roleClient = Role::create(['name' => 'Client']);
        $roleClient->givePermissionTo([
            'listing-browse', 'listing-show', 'listing-edit', 'listing-add', 'listing-delete',
            'listing-trash-recover', 'listing-trash-remove'
        ]);
    }
}
