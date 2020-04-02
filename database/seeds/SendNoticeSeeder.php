<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SendNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Model\SendNotice');
        $to = array('Student', 'Teacher', 'Both');
        for ($i = 1; $i < 18; $i++) {
            DB::table('sendnotice')->insert([
                'to' => $to[$faker->numberBetween(0, 2)],
                'subject'=> $faker->sentence,
                'message' => $faker->paragraph(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

