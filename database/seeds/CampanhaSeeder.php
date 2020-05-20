<?php

use Illuminate\Database\Seeder;

class CampanhaSeeder extends Seeder
{

    public function run()
    {
        DB::table('campanhas')->insert([
            'titulo' => 'Campanha de pagamento de imposto de renda',
            'desc' => 'Campanha de incentivo a você contribuir com a ajuda de crianças do nosso município, fazendo o seu pagamento do imposto de renda.',
            'imagem' => '',
            'video' => '',
            'pdf' => '',
            'user_id' => 1,
        ]);
    }
}
