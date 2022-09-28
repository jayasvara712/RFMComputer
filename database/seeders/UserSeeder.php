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
                'nama'      => 'pemilik',
                'username'  => 'pemilik',
                'email'     => 'pemilik@gmail.com',
                'password'  => bcrypt('pemilik'),
                'no_telp'   => '11111111',
                'role'      => 'pemilik',
                'foto'      => ''
            ],
            [
                'id_user'   => '2',
                'nama'      => 'admin',
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('admin'),
                'no_telp'   => '11111111',
                'role'      => 'admin',
                'foto'      => 'asset-gambar/1LDHI6evyZJ7KUHnPo5azvZn2bNn0MVOIST9cPvz.jpg'
            ],
            [
                'id_user'   => '3',
                'nama'      => 'Lukman',
                'username'  => 'lukman',
                'email'     => 'lukman@gmail.com',
                'password'  => bcrypt('lukman'),
                'no_telp'   => '11111111',
                'role'      => 'admin',
                'foto'      => 'asset-gambar/Jr3WITNqe8FYPsdBDxhbFsGv3IMnuevpaQg88AZ4.jpg'
            ],

        ];
        User::insert($users);
    }
}
