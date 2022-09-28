<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis =  [
            [
                'id_jenis'   => '6',
                'nama_jenis'      => 'VGA Card',
            ],
            [
                'id_jenis'   => '7',
                'nama_jenis'      => 'Processor',
            ],
            [
                'id_jenis'   => '8',
                'nama_jenis'      => 'HDD',
            ],
            [
                'id_jenis'   => '9',
                'nama_jenis'      => 'SSD',
            ],
            [
                'id_jenis'   => '10',
                'nama_jenis'      => 'Motherboard',
            ],
            [
                'id_jenis'   => '11',
                'nama_jenis'      => 'PSU',
            ],
            [
                'id_jenis'   => '12',
                'nama_jenis'      => 'RAM',
            ],

        ];
        Jenis::insert($jenis);
    }
}
