<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::Create([
            'name' => 'Test Admin',
            'username' => 'admin',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $adminUser->assignRole('admin');

        $therapistOne = User::Create([
            'name' => 'Therapist One',
            'username' => 'therapistone',
            'email' => 'therapistone@therapistone.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $therapistOne->assignRole('user');

        $therapistTwo = User::Create([
            'name' => 'Therapist Two',
            'username' => 'therapisttwo',
            'email' => 'therapisttwo@therapisttwo.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $therapistTwo->assignRole('user');
    }
}
