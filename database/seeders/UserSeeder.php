<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'id_user'   => '1',
                'nama'      => 'admin',
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('admin'),
                'no_telp'   => '11111111',
                'role'      => 'admin',
                'foto'      => ''
            ],
            [
                'id_user'   => '2',
                'nama'      => 'pemilik',
                'username'  => 'pemilik',
                'email'     => 'pemilik@gmail.com',
                'password'  => bcrypt('pemilik'),
                'no_telp'   => '11111111',
                'role'      => 'pemilik',
                'foto'      => ''
            ]
        ];
        User::insert($users);
    }
}
