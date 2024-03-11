<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $features = ['users', 'roles'];
        
        foreach ($features as $feature) {
            DB::table('features')->insert([
                'id' => 1,
                'name' => $feature
            ]);
        }        
    }
}
