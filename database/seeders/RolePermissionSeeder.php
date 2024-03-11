<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roleName = DB::table('roles')->where('name', 'admin')->first();
        $permissions = DB::table('permissions')->get();

        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'id' => 1,
                'role_id' => $roleName->id,
                'permission_id' => $permission->id
            ]);
        }
    }
}
