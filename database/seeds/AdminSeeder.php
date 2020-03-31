<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '11111111';
        DB::table("admins")->insert([
            [
                'name' => 'Shrijan Bir Malakar',
                'email' => 'shrijan@gmail.com',
                'job_title' => 'admin',
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Ashish Bhandari',
                'email' => 'ashish336b@gmail.com',
                'job_title' => 'admin',
                'password' => Hash::make($password)
            ],
        ]);
    }
}
