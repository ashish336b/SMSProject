<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Student');
        $password = "11111111";
        DB::table('students')->insert([
            'rollNumber'=> '1',
            'firstName'=> 'Student',
            'lastName'=> 'Study',
            'email'=> 'student@gmail.com',
            'password'=> Hash::make($password),
            'phoneNumber'=> '987654321',
            'address'=> 'Kathmandu',
            'isFeePaid'=>'0',
            'gender'=>'male',
            'classroom_id'=> '1'
        ]);
        $gender = ['Male', 'Female'];
        for($i=1;$i<55;$i++)
        {
            DB::table("students")->insert([
                [
                    "rollNumber"=> $faker->unique()->numerify(),
                    "firstName"=>$faker->firstName,
                    "lastName"=> $faker->lastName,
                    "email"=>$faker->unique()->email,
                    "password"=> Hash::make($password),
                    "phoneNumber"=> $faker->numberBetween(1000000, 999999999),
                    "address"=> $faker->address,
                    'gender'=> $gender[$faker->numberBetween(0,1)],
                    'isFeePaid'=> 0,
                    "classroom_id"=> rand(1,10)
                ],
            ]);
        }
    }
}
