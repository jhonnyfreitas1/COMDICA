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
        	'nome'      => '01',
        	'nome_pdf'      => '01.pdf',
        	'mes'       => '02',
        	'ano'       => '2020',
            'user_id'   => 1,
        ]);

        DB::table('resolucoes')->insert([
            'nome'      => '02',
            'nome_pdf'      => '02.pdf',
            'mes'       => '04',
            'ano'       => '2019',
            'user_id'   => 1,
        ]);

        DB::table('resolucoes')->insert([
            'nome'      => '03',
            'nome_pdf'      => '03.pdf',
            'mes'       => '06',
            'ano'       => '2020',
            'user_id'   => 1,
        ]);
    }
}
