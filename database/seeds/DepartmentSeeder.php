<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            [
                'departmentCode' => 'PHY',
                'name' => 'Physics',
            ],
            [
                'departmentCode' => 'CHE',
                'name' => 'Chemistry',
            ],
            [
                'departmentCode' => 'MAT',
                'name' => 'Maths',
            ],
            [
                'departmentCode' => 'Com',
                'name' => 'Computer Science',
            ],
            [
                'departmentCode' => 'BIO',
                'name' => 'Biology',
            ],
        ]);
    }
}
