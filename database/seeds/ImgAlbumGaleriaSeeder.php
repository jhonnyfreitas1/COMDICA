<?php

use Illuminate\Database\Seeder;

class ImgAlbumGaleriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('img_album_galerias')->insert([
        	'nome' => 'child1.jpeg',
            'album_id' => 1,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'child2.jpeg',
            'album_id' => 1,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'child3.jpeg',
            'album_id' => 2,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'child4.jpeg',
            'album_id' => 2,
        ]);
    }
}
