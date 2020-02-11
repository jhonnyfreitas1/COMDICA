<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUserSeeder extends Seeder
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
        	'name' => 'Policia',
        ]);        
        DB::table('tipos_users')->insert([
        	'name' => 'Conselho Tutelar',
        ]);
        DB::table('tipos_users')->insert([
        	'name' => 'Hospital',
        ]);
    }
}
