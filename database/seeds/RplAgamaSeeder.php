<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\RplAgama;

class RplAgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i < 38; $i++) { 
            RplAgama::create([
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
            RplAgama::create([
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
            RplAgama::create([
                'nama' => $faker->name,
                'nama_kelas' => 'XIIRPL3',
                'nis' => rand(10000, 30000),
                'K1' => rand(50, 100),
                'K2' => rand(80, 95),
                'K3' => rand(75, 100),
                'K4' => rand(30, 75),
            ]);
        }

        // for ($i=1; $i < 38; $i++) { 
        //     RplAgama::create([
        //         'nama' => $faker->name,
        //         'id_kelas' => 4,
        //         'nis' => rand(10000, 30000),
        //         'K1' => rand(50, 100),
        //         'K2' => rand(80, 95),
        //         'K3' => rand(75, 100),
        //         'K4' => rand(30, 75),
        //     ]);
        // }

        // for ($i=1; $i < 38; $i++) { 
        //     RplAgama::create([
        //         'nama' => $faker->name,
        //         'id_kelas' => 5,
        //         'nis' => rand(10000, 30000),
        //         'K1' => rand(50, 100),
        //         'K2' => rand(80, 95),
        //         'K3' => rand(75, 100),
        //         'K4' => rand(30, 75),
        //     ]);
        // }

        // for ($i=1; $i < 38; $i++) { 
        //     RplAgama::create([
        //         'nama' => $faker->name,
        //         'id_kelas' => 6,
        //         'nis' => rand(10000, 30000),
        //         'K1' => rand(50, 100),
        //         'K2' => rand(80, 95),
        //         'K3' => rand(75, 100),
        //         'K4' => rand(30, 75),
        //     ]);
        // }
    }
}
