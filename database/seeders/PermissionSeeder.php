<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $features = DB::table('features')->get();
        $permissions = ['create', 'read', 'update', 'delete'];
        
        foreach ($features as $feature) {
            foreach ($permissions as $permission) {
                DB::table('permissions')->insert([
                    'id' => 1,
                    'name' => $permission,
                    'feature_id' => $feature->id
                ]);
            }
        }
    }
}
