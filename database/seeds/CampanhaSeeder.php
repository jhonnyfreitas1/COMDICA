<?php

use Illuminate\Database\Seeder;

class CampanhaSeeder extends Seeder
{

    public function run()
    {
        DB::table('campanhas')->insert([
            'titulo' => 'Campanha de pagamento de imposto de renda',
            'desc' => 'Campanha de incentivo a você contribuir com a ajuda de crianças do nosso município, fazendo o seu pagamento do imposto de renda.',
            'user_id' => 1,
        ]);
        DB::table('img_campanhas')->insert([
        	'nome_img' => 'foto-campanha-01-2020.jpeg',
            'campanha_id' => 1,
        ]);
        DB::table('video_campanhas')->insert([
        	'nome_video' => 'campanha-01-2020.mp4',
            'campanha_id' => 1,
        ]);
    }
}
