<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'NIM' => '2141720348',
                'Nama' => 'Muhammad Ardi',
                'Kelas' => '2E_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '081246578892',
                'Email' => 'ardi@gmail.com',
                'Tanggal_lahir' => '12-06-2003'
            ],
            [
                'NIM' => '2141720638',
                'Nama' => 'Rahayu Ruli',
                'Kelas' => '2H_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082132543059',
                'Email' => 'raha@gmail.com',
                'Tanggal_lahir' => '12-06-2003'
            ],
            [
                'NIM' => '2141720077',
                'Nama' => 'Endar Darma',
                'Kelas' => '2B_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '0812934598020',
                'Email' => 'endar@gmail.com',
                'Tanggal_lahir' => '17-03-2003'
            ],
            [
                'NIM' => '2141720088',
                'Nama' => 'Izamul Pigri',
                'Kelas' => '2D_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '081223355020',
                'Email' => 'izamul@gmail.com',
                'Tanggal_lahir' => '03-02-2003'
            ],
            [
                'NIM' => '2141720049',
                'Nama' => 'Rayhan Surya',
                'Kelas' => '2G_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '081234598444',
                'Email' => 'ray@gmail.com',
                'Tanggal_lahir' => '02-12-2003'
            ],
            [
                'NIM' => '2141720129',
                'Nama' => 'Aryani Edi',
                'Kelas' => '2F_D4-TI',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082143598020',
                'Email' => 'edi@gmail.com',
                'Tanggal_lahir' => '17-08-2003'
            ]
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
