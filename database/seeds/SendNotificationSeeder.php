<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SendNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Model\SendNotification');
        $to = array('Student', 'Teacher', 'Both');
        for ($i = 1; $i < 18; $i++) {
            DB::table('sendNotification')->insert([
                'to' => $to[$faker->numberBetween(0, 2)],
                'subject'=> $faker->sentence,
                'message' => $faker->paragraph(20),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
