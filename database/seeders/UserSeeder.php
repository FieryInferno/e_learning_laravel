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
        [
          'id_user'   => '1',
          'username'  => 'admin',
          'password'  => Hash::make('admin'),
          'role'      => 'admin',
        ], [
          'id_user'   => '2',
          'username'  => 'guru',
          'password'  => Hash::make('guru'),
          'role'      => 'guru',
        ], [
          'id_user'   => '3',
          'username'  => 'siswa',
          'password'  => Hash::make('siswa'),
          'role'      => 'siswa',
        ]
      ]);
    }
}
