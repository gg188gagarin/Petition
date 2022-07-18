<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $faker = Factory::create();

        for ($i = 0; $i < 7; $i++) {
            $user->save([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password
            ]);
        }
    }
}

