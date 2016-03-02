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
        DB::table('department_user')->insert(array(

            array(
                'department_id' => ,
                'user_id' => ,
                'permission_level' => ),

            array(
                'department_id' => ,
                'user_id' => ,
                'permission_level' => ),

            array(
                'department_id' => ,
                'user_id' => ,
                'permission_level' => ),

            array(
                'department_id' => ,
                'user_id' => ,
                'permission_level' => )

        ));
    }
}
