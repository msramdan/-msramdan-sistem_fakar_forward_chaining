<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_penyakit')->insert([
            [
                'kd_penyakit' => 'P0001',
                'penyakit' => 'Skizofrenia',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_penyakit' => 'P0002',
                'penyakit' => 'Depresi',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_penyakit' => 'P0003',
                'penyakit' => 'Kecemasan',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_penyakit' => 'P0004',
                'penyakit' => 'Psikomatik',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_penyakit' => 'P0005',
                'penyakit' => 'Bipolar',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_penyakit' => 'P0006',
                'penyakit' => 'Post Traumatic Stress Disorder',
                'keterangan' => '-',
                'solusi' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
