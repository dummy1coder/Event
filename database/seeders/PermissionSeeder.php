<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $permissions = [
                'create-role',
                'edit-role',
                'delete-role',
                'create-user',
                'edit-user',
                'delete-user',
                'create-event',
                'edit-event',
                'delete-event',
                'update-event',
                'View-event',
                'reserve-event',
                'approve-event'
            ];

            foreach ($permissions as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'guard_name' => 'api'
                ]);
            }
        }
    }
}
