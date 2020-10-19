<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_users')->insert([
        	'name' => 'Admin',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Comdica',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Conselho Tutelar',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Polícia Cívil',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Ministério Público',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Judiciário',
        ]);
    }
}
