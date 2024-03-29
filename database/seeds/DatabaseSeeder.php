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
        $this->call(SiswaSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(RplAgamaSeeder::class);
        $this->call(RplMatematikaSeeder::class);
        $this->call(RplIndonesiaSeeder::class);
        $this->call(RplInggrisSeeder::class);
        $this->call(RplProduktifSeeder::class);
        $this->call(UserNilaimuSeeder::class);
    }
}
