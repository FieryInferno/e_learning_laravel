<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id_user'       => '1',
        'username'      => 'admin',
        'nama_lengkap'  => 'M. Bagas Setia',
        'password'      => Hash::make('admin'),
        'role'          => 'admin',
        'foto'          => 'Foto_Wisuda4.jpg'
      ]);
    }
}
