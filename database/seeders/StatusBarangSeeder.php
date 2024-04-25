<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_detail_status' => 1,
                'kode_status' => 'B',
                'nama_status' => 'Baik'
            ],
            [
                'id_detail_status' => 2,
                'kode_status' => 'RR',
                'nama_status' => 'Rusak Ringan'
            ],
            [
                'id_detail_status' => 3,
                'kode_status' => 'RB',
                'nama_status' => 'Rusak Berat'
            ]
        ];
        DB::table('detail_status_barang')->insert($data);
    }
}
