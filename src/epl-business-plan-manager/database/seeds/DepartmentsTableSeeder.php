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
                'name' => "IT Services",
                'isTeam' => 0),

            // 3
            array(
                'name' => "Human Resources",
                'isTeam' => 0),

            // 4
            array(
                'name' => "Financial Services",
                'isTeam' => 0),

            // 5
            array(
                'name' => "Marketing",
                'isTeam' => 0),

            // 6
            array(
                'name' => "Fund Development",
                'isTeam' => 0),

            // 7
            array(
                'name' => "Collection Management and Access",
                'isTeam' => 0),

            // 8
            array(
                'name' => "School Aged Services (SAS) Team",
                'isTeam' => 1),

            // 9
            array(
                'name' => "Community-Led Team",
                'isTeam' => 1),

            // 10
            array(
                'name' => "Foundational Programming Team",
                'isTeam' => 1),

            // 11
            array(
                'name' => "Membership Services Team",
                'isTeam' => 1),

            // 12
            array(
                'name' => "Discovery Team",
                'isTeam' => 1),
        ));
    }
}
