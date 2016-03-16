<?php

use Illuminate\Database\Seeder;

class DepartmentUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_users')->insert(array(

            array(
                'department_id' => 2,
                'user_id' => 1,
                'permission_level' => 'T'),

            array(
                'department_id' => 2,
                'user_id' => 2,
                'permission_level' => 'M'),

            array(
                'department_id' => 3,
                'user_id' => 3,
                'permission_level' => 'T'),

            array(
                'department_id' => 3,
                'user_id' => 4,
                'permission_level' => 'M'),

            array(
                'department_id' => 4,
                'user_id' => 5,
                'permission_level' => 'T'),

            array(
                'department_id' => 4,
                'user_id' => 6,
                'permission_level' => 'M')

        ));
    }
}
