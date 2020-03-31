<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classroom')->insert([
            [
                'department_id' => '1',
                'name' => 'BSCPhysics3rd'
            ],
            [
                'department_id' => '1',
                'name' => 'BSCPhysics5th'
            ],
            [
                'department_id' => '2',
                'name' => 'BSCChemistry5th'
            ],
            [
                'department_id' => '2',
                'name' => 'BSCChemistry6th'
            ],
            [
                'department_id' => '3',
                'name' => 'BSCMath3rd'
            ],
            [
                'department_id' => '3',
                'name' => 'BSCMath4th'
            ],
            [
                'department_id' => '4',
                'name' => 'BIM4th'
            ],
            [
                'department_id' => '4',
                'name' => 'BIM5th'
            ],
            [
                'department_id' => '5',
                'name' => 'MicroBIO3rd'
            ],
            [
                'department_id' => '5',
                'name' => 'MicroBIO3rd'
            ],
        ]);
    }
}
