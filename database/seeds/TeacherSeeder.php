<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Teachers');
        $password = "11111111";
        DB::table('teachers')->insert([
            'rollNumber'=> '1AB',
            'firstName'=> 'Ashish',
            'lastName'=> 'Bhandari',
            'email'=> 'ashish336b@gmail.com',
            'password'=> Hash::make($password),
            'phoneNumber'=> '987654321',
            'address'=> 'Kathmandu',
            'department_id'=> '1'
        ]);
        for($i=1;$i<12;$i++)
        {
            DB::table("teachers")->insert([
                [
                    "rollNumber"=> $faker->unique()->numerify(),
                    "firstName"=>$faker->firstName,
                    "lastName"=> $faker->lastName,
                    "email"=>$faker->unique()->email,
                    "password"=> Hash::make($password),
                    "phoneNumber"=> $faker->numberBetween(9800000000, 989999999),
                    "address"=> $faker->address,
                    "department_id"=> rand(1,5)
                ],
            ]);
        }
    }
}
