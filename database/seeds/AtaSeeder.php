<?php

use Illuminate\Database\Seeder;

class AtaSeeder extends Seeder
{
    public function run()
    {
        DB::table('atas')->insert([
        	'nome' => 'Ata do dia 25/06/2019.pdf',
        	'data' => '06-2019',
            'user_id' => 1,
        ]);

        DB::table('atas')->insert([
        	'nome' => 'Ata do dia 13/06/2019.pdf',
        	'data' => '06-2019',
            'user_id' => 1,
        ]);

        DB::table('atas')->insert([
        	'nome' => 'Ata do dia 23/02/2019.pdf',
        	'data' => '02-2019',
            'user_id' => 1,
        ]);

        DB::table('atas')->insert([
        	'nome' => 'Ata do dia 02/01/2020.pdf',
            'data' => '01-2020',
            'user_id' => 1,
        ]);
    }
}
