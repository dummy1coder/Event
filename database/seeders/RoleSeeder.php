<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'api']);
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'api']);
        $organizer = Role::firstOrCreate(['name' => 'organizer', 'guard_name' => 'api']);
        $attendee = Role::firstOrCreate(['name' => 'attendee', 'guard_name' => 'api']);

        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'create-event',
            'update-event',
            'edit-event',
            'View-event',
            'delete-event',
            'approve-event'
        ]);

        $organizer->givePermissionTo([
            'create-event',
            'edit-event',
            'delete-event',
            'update-event',
            'approve-event',
            'View-event',
        ]);

        $attendee->givePermissionTo([
            'reserve-event',
            'View-event',
        ]);
    }
}
