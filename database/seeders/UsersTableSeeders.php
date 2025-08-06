<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    public function run(): void
    {
        // Admin user
        DB::table('users')->insert([
            'name' => 'Admin Sekolah',
            'email' => 'admin2@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'created_at' => now(),
        ]);

        // Siswa user
        DB::table('users')->insert([
            'name' => 'Riky Siswa',
            'email' => 'riky@example.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'created_at' => now(),
        ]);
        $this->call([
        UsersTableSeeders::class,
    ]);
    }
    
}
