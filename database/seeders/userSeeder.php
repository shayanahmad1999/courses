<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for($i = 1; $i <= 10; $i++)
        {
            $admin = new User;
            $admin->name = $faker->name; 
            $admin->email = $faker->email; 
            $admin->password = md5($faker->password); 
            $admin->save();
        }
    }
}
