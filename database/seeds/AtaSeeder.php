<?php

use Illuminate\Database\Seeder;

class AtaSeeder extends Seeder
{
    public function run()
    {
        DB::table('atas')->insert([
        	'nome' => '01.pdf',
        	'mes' => '06',
        	'ano' => '2019',
        	'tipo' => 'ordinaria',
            'user_id' => 1,
            ]);

            DB::table('atas')->insert([
            'nome' => '02.pdf',
            'mes' => '06',
            'ano' => '2019',
            'tipo' => 'ordinaria',
            'user_id' => 1,
        ]);

        DB::table('atas')->insert([
        	'nome' => '03.pdf',
        	'mes' => '02',
        	'ano' => '2019',
            'tipo' => 'ordinaria',
            'user_id' => 1,
        ]);

        DB::table('atas')->insert([
        	'nome' => '04.pdf',
            'mes' => '01',
            'ano' => '2020',
            'tipo' => 'ordinaria',
            'user_id' => 1,
        ]);
    }
}
