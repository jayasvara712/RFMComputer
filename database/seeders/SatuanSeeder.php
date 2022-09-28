<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan =  [
            [
                'id_satuan'     => '1',
                'nama_satuan'   => 'Pcs',
            ],
            [
                'id_satuan'     => '2',
                'nama_satuan'   => 'Keping',
            ],
            [
                'id_satuan'     => '3',
                'nama_satuan'   => 'Unit',
            ],

        ];
        Satuan::insert($satuan);
    }
}
