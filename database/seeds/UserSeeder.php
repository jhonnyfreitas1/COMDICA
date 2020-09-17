<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
   public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jhonny Farias',
            'email' => 'admin@aracoiaba.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Comdica',
            'email' => 'comdica@aracoiaba.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'Conselho Tutelar',
            'email' => 'ct@comdica.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'Polícia Civil',
            'email' => 'pc@comdica.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 4,
        ]);
        DB::table('users')->insert([
            'name' => 'Ministério Público',
            'email' => 'mp@comdica.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 5,
        ]);
        DB::table('users')->insert([
            'name' => 'Judiciário',
            'email' => 'j@comdica.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'tipo_user' => 6,
        ]);

    }

}
