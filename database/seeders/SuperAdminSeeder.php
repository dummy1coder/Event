<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $superAdmin = User::create([
            'name' => 'Test', 
            'email' => 'test@gmail.com',
            'password' => Hash::make('test1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Dummy', 
            'email' => 'dummy@gmail.com',
            'password' => Hash::make('dummy1234')
        ]);
        $admin->assignRole('Admin');

        $organizer = User::create([
            'name' => 'Love', 
            'email' => 'love@gmail.com',
            'password' => Hash::make('love1234')
        ]);
        $organizer->assignRole('organizer');

        $attendee = User::create([
            'name' => 'Love', 
            'email' => 'love1@gmail.com',
            'password' => Hash::make('love1234')
        ]);
        $attendee->assignRole('attendee');
    }
}
