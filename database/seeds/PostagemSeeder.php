<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostagemSeeder extends Seeder
{
    public function run()
    {
        DB::table('postagens')->insert([
        	'titulo' => 'CORONAVÍRUS',
            'descricao' => 'CORONA ATACA O MUNDO INTEITO',
            'imagem_principal' =>'',
            'arquivada' => 0,
            'categoria' => 1,
            'user_id' => 2,
        ]);

        DB::table('postagens')->insert([
        	'titulo' => 'VESTIBULAR IFPE',
            'descricao' => 'INSCREVA-SE, VEJA SE ATENDE AO PERFIL E SOLICITE A ISENÇÃO DA TAXA ATÉ 24 DE OUTUBRO',
            'imagem_principal' => '',
            'arquivada' => 1,
            'categoria' => 1,
            'user_id' => 1,
        ]);
    }
}
