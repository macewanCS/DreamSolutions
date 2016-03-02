<?php

use Illuminate\Database\Seeder;

class DepartmentGoatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_goat')->insert(array(

            array(
                'dept_id' => 2,
                'goat_id' => 11,
                'dept_role' => 'C'),

            array(
                'dept_id' => 3,
                'goat_id' => 13,
                'dept_role' => 'C'),

            array(
                'dept_id' => 4,
                'goat_id' => 13,
                'dept_role' => 'C')

        ));
    }
}
