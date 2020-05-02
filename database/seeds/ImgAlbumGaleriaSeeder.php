<?php

use Illuminate\Database\Seeder;

class ImgAlbumGaleriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('img_album_galerias')->insert([
        	'nome' => 'img1.jpg',
            'album_id' => 1,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'img2.jpg',
            'album_id' => 1,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'img1.jpg',
            'album_id' => 2,
        ]);

        DB::table('img_album_galerias')->insert([
        	'nome' => 'img2.jpg',
            'album_id' => 2,
        ]);
    }
}
