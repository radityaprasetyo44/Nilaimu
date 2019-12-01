<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\UserNilaimu;

class UserNilaimuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        UserNilaimu::create([
            'nama' => 'Muhammad Raditya Prasetyo',
            'status' => 'student',
            'username' => 'muhammad',
            'password' => bcrypt('raditya')
        ]);

        UserNilaimu::create([
            'nama' => 'Benito Yvan',
            'status' => 'student',
            'username' => 'benito',
            'password' => bcrypt('yvan')
        ]);

        UserNilaimu::create([
            'nama' => 'Kukuh Gilang',
            'status' => 'student',
            'username' => 'kukuh',
            'password' => bcrypt('gilang')
        ]);

        UserNilaimu::create([
            'nama' => 'Firdausa',
            'status' => 'teacher',
            'username' => 'firdaus',
            'password' => bcrypt('firdaus')
        ]);
    }
}
