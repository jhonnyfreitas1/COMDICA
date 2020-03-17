<?php

use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('imgs_insts')->insert([
        'imagem_princ' => 'img_1.jpg',
        'imagem_sec' => 'img_2.jpg',
        'imagem_ter' => 'img_3.jpg',
        ]);
        DB::table('instituicoes')->insert([
        'name' => 'Comdica',
        'desc' => 'Pretendemos crescer e nos multiplicar a paz nas familias protegendo as crianças',
        'telefone' => '(81)9999-9999',
        'endereco' => 'Rua Comdica Aracoiaba, nº 01',
        'email' => 'comdica@aracoiaba.com',
        'site' => 'www.comdicaaracoiaba.com',
        'inst_img' => 1,
        ]);
    }
}
