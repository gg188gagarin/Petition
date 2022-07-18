<?php

namespace App\Database\Seeds;

use App\Models\Petition;
use CodeIgniter\Database\Seeder;

class PetitionSeeder extends Seeder
{
    public function run()
    {
        $petition = new Petition();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 35; $i++){
            $petition->save([
                'name' => $faker->name,
                'description' => $faker->text,
            ]);
        }
    }
}
