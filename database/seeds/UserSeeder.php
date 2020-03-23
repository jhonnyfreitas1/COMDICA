<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
   public function run()
    {
        DB::table('users')->insert([
            'name' => 'jhonny farias',
            'email' => 'comdica@aracoiaba.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'erickson ferreira',
            'email' => 'erickson@aracoiaba.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 1,
        ]);

    }

}
