<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        
        // 1. Seeder Kategori 
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Server & Cloud', 'code' => 'SRV', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Internet of Things', 'code' => 'IOT', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Multimedia & Drone', 'code' => 'DRV', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Seeder Data Perangkat Laboratorium
        DB::table('equipments')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'asset_code' => 'EQ-SRV-001',
                'name' => 'Perangkat SRV 1',
                'specification' => '16GB RAM',
                'condition' => 'baik',
                'status' => 'dipinjam',
                'daily_rental_fee' => 75000,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 2,
                'category_id' => 3,
                'asset_code' => 'EQ-DRN-001',
                'name' => 'Perangkat DRN 1',
                'specification' => '60fps Camera',
                'condition' => 'baik',
                'status' => 'tersedia',
                'daily_rental_fee' => 50000,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 3,
                'category_id' => 3,
                'asset_code' => 'EQ-DRN-002',
                'name' => 'Perangkat DRN 2',
                'specification' => '60fps Camera',
                'condition' => 'rusak_berat',
                'status' => 'dalam_perbaikan',
                'daily_rental_fee' => 25000;
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'asset_code' => 'EQ-IOT-001',
                'name' => 'Perangkat IOT 1',
                'specification' => 'Quad-core Cortex-A72 @1.5GHz, 8GB LPDDR4, MicroSD 64GB',
                'condition' => 'baik',
                'status' => 'tersedia',
                'daily_rental_fee' => 10000,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 5,
                'category_id' => 2,
                'asset_code' => 'EQ-IOT-002',
                'name' => 'Perangkat IOT 2',
                'specification' => ' Quad-core Cortex-A72 @1.5GHz, 8GB LPDDR4',
                'condition' => 'rusak_ringan',
                'status' => 'dalam_perbaikan',
                'daily_rental_fee' => 8000,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'asset_code' => 'EQ-SRV-002',
                'name' => 'Perangkat SRV 2',
                'specification' => '32GB RAM',
                'condition' => 'baik',
                'status' => 'tersedia',
                'daily_rental_fee' => 85000,
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}

