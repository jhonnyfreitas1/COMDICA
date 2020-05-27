<?php

use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('instituicoes')->insert([
            'name' => 'Comdica',
            'desc' => 'Pretendemos crescer e nos multiplicar a paz nas familias protegendo as crianças',
            'telefone' => '(81)9999-9999',
            'endereco' => 'Rua Comdica Aracoiaba, nº 01',
            'email' => 'comdica@aracoiaba.com',
            'site' => 'www.comdicaaracoiaba.com',
            'user_id' => 1,
        ]);
        DB::table('galeria_insts')->insert([
            'img1' => 'img_0.jpg',
            'img2' => 'img_1.jpg',
            'instituicao_id' => 1,
        ]);
        DB::table('imgs_insts')->insert([
            'nome' => 'img_11234.jpg',
            'galeria_id' => 1,
        ]);
        DB::table('video_insts')->insert([
            'nome' => 'video.mp4',
            'galeria_id' => 1,
        ]);
    }
}
