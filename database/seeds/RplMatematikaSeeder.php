<?php

use Illuminate\Database\Seeder;

use App\RplMatematika;

use Faker\Generator as Faker;

class RplMatematikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL1',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL2',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL3',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL4',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL5',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        for ($i=1; $i < 38; $i++) { 
            RplMatematika::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL6',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }
    }
}
