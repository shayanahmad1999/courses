<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\admin;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for ($i=1; $i <=10 ; $i++) { 
            $admin = new admin;
                //from DB               from Form
        $admin->adminFirstName = $faker->firstname;
        $admin->adminLastName = $faker->lastname;
        $admin->adminEmail = $faker->email;
        $admin->adminPassword = md5($faker->password);
        $admin->adminAddress = $faker->address;
        $admin->save();
        }
    }
}
