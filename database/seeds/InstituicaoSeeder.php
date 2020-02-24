<?php

use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('imgs_insts')->insert([
        'imagem_princ' => 'img_1',
        'imagem_sec' => 'img_2',
        'imagem_ter' => 'img_3',
        'imagem_qua' => 'img_4',
        ]);
        DB::table('instituicoes')->insert([
        'name' => 'Comdica',
        'visao' => 'Pretendemos crescer e nos multiplicar',
        'valor' => 'Paz, amor e confiança',
        'missao' => 'Melhorar a vida das crianças do nosso municipio',
        'inst_img' => 1,
        ]);
    }
}
