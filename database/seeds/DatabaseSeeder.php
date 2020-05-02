<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(TypeUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostagemSeeder::class);
        $this->call(InstituicaoSeeder::class);
        $this->call(AlbumGaleriaSeeder::class);
        $this->call(ImgAlbumGaleriaSeeder::class);
        $this->call(AtaSeeder::class);
        $this->call(ResolucaoSeeder::class);
    }
}
