<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Melina',
                    'perfil' => '/administradores/1/img_6264194c1be9e.png',
                    'ci' => '012345',
                    'email' => 'melina@gmail.com',
                    'password' => Hash::make('123456'),
                    'eliminado' => 0,
                    'inhabilitado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
