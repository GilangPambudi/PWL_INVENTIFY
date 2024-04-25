<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_role' => 1,
                'kode_role' => 'ADM',
                'nama_role' => 'Admin'
            ],
            [
                'id_role' => 2,
                'kode_role' => 'VRF',
                'nama_role' => 'Verifikator'
            ]
        ];
        DB::table('role')->insert($data);
    }
}
