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
                'isSuperAdmin'=> "1",
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Ashish Bhandari',
                'email' => 'ashish336b@gmail.com',
                'job_title' => 'admin',
                'isSuperAdmin'=> "0",
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'job_title' => 'admin',
                'isSuperAdmin'=> "0",
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Admin3',
                'email' => 'admin3@gmail.com',
                'job_title' => 'admin',
                'isSuperAdmin'=> "0",
                'password' => Hash::make($password)
            ],
        ]);
    }
}
