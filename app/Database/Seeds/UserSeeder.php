<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new UserModel();
        $faker = Factory::create();

        for ($i = 0; $i < 170; $i++) {
            $user->save([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password
            ]);
        }
    }
}

