<?php

use Illuminate\Database\Seeder;

class AlbumGaleriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('album_galerias')->insert([
        	'titulo' => 'Evento do dia das crianças',
        	'descricao' => 'Evento realizado em araçoiaba no dia 12/10/2019 com o intuito de distribuir brinquedo para as crianças do município',
            'user_id' => 1,
        ]);

        DB::table('album_galerias')->insert([
        	'titulo' => 'Campanha conscientizadora contra o coronavírus ',
        	'descricao' => 'Estamos com uma campanha contra o coronavírus, pois sabemos que se estivermos unidos iremos vencê-lo. Por isso: FIQUE EM CASA!',
            'user_id' => 1,
        ]);
    }
}
