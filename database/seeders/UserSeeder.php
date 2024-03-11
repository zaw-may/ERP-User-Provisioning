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

       $roleName = DB::table('roles')->where('name', 'admin')->first();

       DB::table('users')->insert([
        'id' => 'admin001',
        'name' => 'Zak',
        'username' => 'admin',
        'role_id' => $roleName->id,
        'phone' => '95975564312',
        'email' => 'admin@gmail.com',
        'address' => 'No.615',        
        'gender' => 'F',
        'is_active' => 'Away',
        'password' => Hash::make('admin@123')
       ]);
    }
}
