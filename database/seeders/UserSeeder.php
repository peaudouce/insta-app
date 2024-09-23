<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;

        $users = [
            [
                'name' => 'Erika',
                'email' => 'erika@example.com',
                'password' => Hash::make('1234abcd'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Joh',
                'email' => 'joh@example.com',
                'password' => Hash::make('abcd1234'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@example.com',
                'password' => Hash::make('ab12cd34'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ];

        $user->insert($users);
    }
}
