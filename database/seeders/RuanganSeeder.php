<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_ruang' => 1,
                'kode_ruang' => 'R06.01',
                'nama_ruang' => 'R. Dosen 1',
                'nip' => '1971111019990',
                'penanggung_jawab' => 'Rudy Ariyanto, ST., M.Cs.'
            ],
            [
                'id_ruang' => 2,
                'kode_ruang' => 'R06.02',
                'nama_ruang' => 'R. Dosen 2',
                'nip' => '1971111019990',
                'penanggung_jawab' => 'Rudy Ariyanto, ST., M.Cs.'
            ],
            [
                'id_ruang' => 3,
                'kode_ruang' => 'R06.07',
                'nama_ruang' => 'KPS D3 dan KPS D4',
                'nip' => '1983052120060',
                'penanggung_jawab' => 'Hendra Pradipta, SE., M.Sc'
            ],
        ];
        DB::table('ruang')->insert($data);
    }
}
