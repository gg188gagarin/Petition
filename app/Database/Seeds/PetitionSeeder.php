<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PetitionModel;
use App\Models\UserModel;

class PetitionSeeder extends Seeder
{
    private $user ;

    public function run()
    {
        $this->user = new UserModel();
        $petition = new PetitionModel();
        $faker = \Faker\Factory::create();


        $users = $this->user->findAll();
        foreach ($users as $user)
            for ($i = 0; $i < random_int(3,10); $i++) {
                $petition->save([
                    'name' => $faker->text(150),
                    'user_id' => $user['id'],
                    'description' => $faker->text(2000),
                    'status' => 'draft'
                ]);
            }
    }
}