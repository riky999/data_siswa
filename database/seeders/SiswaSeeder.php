<?php

namespace Database\Seeders;
// use Illuminate\Container\Attributes\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('siswa')->insert([
            'nama'=>'riky',
            'nomer_induk'=> '1000',
            'alamat' => 'bantul',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'budi',
            'nomer_induk'=> '1001',
            'alamat' => 'lumajang',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'candra',
            'nomer_induk'=> '1002',
            'alamat' => 'pasirian',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
