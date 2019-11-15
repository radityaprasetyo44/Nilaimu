<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Nilaimu;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i < 50; $i++) { 
            Nilaimu::create([
                'nama' => $faker->name,
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }
    }
}
