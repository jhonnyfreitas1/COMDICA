<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostagemSeeder::class);
    }
}
