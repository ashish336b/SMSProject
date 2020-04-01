<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
            'firstName'=> 'Teacher',
            'lastName'=> 'Teaches',
            'email'=> 'teacher@gmail.com',
            'password'=> Hash::make($password),
            'phoneNumber'=> '987654321',
            'address'=> 'Kathmandu',
            'department_id'=> '1'
        ]);
        for($i=1;$i<40;$i++)
        {
            DB::table("teachers")->insert([
                [
                    "rollNumber"=> $faker->unique()->numerify(),
                    "firstName"=>$faker->firstName,
                    "lastName"=> $faker->lastName,
                    "email"=>$faker->unique()->email,
                    "password"=> Hash::make($password),
                    "phoneNumber"=> $faker->numberBetween(1000000, 999999999),
                    "address"=> $faker->address,
                    "department_id"=> rand(1,5)
                ],
            ]);
        }
    }
}
