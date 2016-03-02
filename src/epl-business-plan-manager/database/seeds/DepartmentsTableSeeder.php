<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(array(

            array(
                'name' => "Events Team",
                'isTeam' => 1),

            array(
                'name' => "ITS",
                'isTeam' => 0),

            array(
                'name' => str_random(10),
                'isTeam' => rand(0, 1))
        ));
    }
}
