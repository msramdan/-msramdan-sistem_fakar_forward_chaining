<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_rule')->insert([
            [
                'penyakit_id' => 1,
                'gejala_id' => 1,
                'nilai' => 0.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 2,
                'nilai' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 3,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 4,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 5,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 6,
                'nilai' => 0.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // penyakit 2
            [
                'penyakit_id' => 2,
                'gejala_id' => 7,
                'nilai' => 0.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 8,
                'nilai' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 9,
                'nilai' => 0.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 10,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 11,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 12,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 13,
                'nilai' => 0.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 14,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // penyakit 3
            [
                'penyakit_id' => 3,
                'gejala_id' => 15,
                'nilai' => 0.1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 16,
                'nilai' => 0.4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 17,
                'nilai' => 0.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 18,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 19,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 20,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 21,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // penyakit 4
            [
                'penyakit_id' => 4,
                'gejala_id' => 11,
                'nilai' => 0.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 19,
                'nilai' => 0.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 22,
                'nilai' => 0.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 23,
                'nilai' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 24,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 25,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 26,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 27,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // penyakit 5
            [
                'penyakit_id' => 5,
                'gejala_id' => 8,
                'nilai' => 0.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 9,
                'nilai' => 0.4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 10,
                'nilai' => 0.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 17,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 20,
                'nilai' => 0.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 28,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 5,
                'gejala_id' => 29,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // penyakit 6
            [
                'penyakit_id' => 6,
                'gejala_id' => 6,
                'nilai' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 6,
                'gejala_id' => 15,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 6,
                'gejala_id' => 20,
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 6,
                'gejala_id' => 30,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyakit_id' => 6,
                'gejala_id' => 31,
                'nilai' => 0.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
