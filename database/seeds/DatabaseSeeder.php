<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            ClassroomSeeder::class,
            SendNoticeSeeder::class
        ]);
    }
}
