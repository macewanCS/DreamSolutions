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

            // 1
            array(
                'name' => "Events Team",
                'isTeam' => 1),

            // 2
            array(
                'name' => "ITS",
                'isTeam' => 0),

            // 3
            array(
                'name' => "IT",
                'isTeam' => 0),

            // 4
            array(
                'name' => "DLI",
                'isTeam' => 0),

            // 5
            array(
                'name' => str_random(10),
                'isTeam' => rand(0, 1))
        ));
    }
}
