<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

use App\siswa;

$factory->define(siswa::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'nis' => rand(100, 1000),
        'alamat' => $faker->address
    ];
});
