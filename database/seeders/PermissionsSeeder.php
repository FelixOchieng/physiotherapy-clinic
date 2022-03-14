<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('permissions')->delete();
        DB::table('roles')->delete();

        $permissions = [
            'add appointment',
            'edit appointment',
            'view appointment',
            'delete appointment',
            'change appointment status',
            'add client',
            'edit client',
            'view client',
            'delete client',
            'add user',
            'edit user',
            'view user',
            'delete user',
            'add role',
            'edit role',
            'view role',
            'delete role',
            'add permission',
            'edit permission',
            'view permission',
            'delete permission',
            'add therapy room',
            'edit therapy room',
            'view therapy room',
            'delete therapy room'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'view appointment',
            'change appointment status',
        ]);
    }
}
