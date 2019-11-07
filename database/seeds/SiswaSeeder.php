<?php

use Illuminate\Database\Seeder;

use App\siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(siswa::class, 20)->create();
    }
}
