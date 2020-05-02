<?php

use Illuminate\Database\Seeder;

class ResolucaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resolucoes')->insert([
        	'nome' => 'Resolução Nº8002',
            'user_id' => 1,
        ]);

        DB::table('resolucoes')->insert([
        	'nome' => 'Resolução Nº2231',
            'user_id' => 1,
        ]);

        DB::table('resolucoes')->insert([
        	'nome' => 'Resolução Nº434',
            'user_id' => 1,
        ]);
    }
}
