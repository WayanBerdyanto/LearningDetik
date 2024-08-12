<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KejuruanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kejuruan')->insert([
            [
                'nama_kejuruan' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kejuruan' => 'Information Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kejuruan' => 'Human Capital',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kejuruan' => 'Product',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kejuruan' => 'Redaksi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
