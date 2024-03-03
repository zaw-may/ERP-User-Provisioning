<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
        'id' => 'admin001',
        'name' => 'Zak',
        'username' => 'Admin',
        'role_id' => 1,
        'phone' => '95975564312',
        'email' => 'admin@gmail.com',
        'address' => 'No.615',        
        'gender' => 'F',
        'is_active' => 'Away',
        'password' => Hash::make('admin@123')
       ]);
    }
}
