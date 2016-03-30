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

            // IT Services
            // Vicky Varga
            array(
                'department_id' => 2,
                'user_id' => 1,
                'permission_level' => 'T'),

            // Foundational Programming Team
            // Vicky Varga
            array(
                'department_id' => 10,
                'user_id' => 1,
                'permission_level' => 'M'),

            // Events Team
            // Vicky Varga
            array(
                'department_id' => 1,
                'user_id' => 1,
                'permission_level' => 'M'),

            // Events Team
            // John Doe
            array(
                'department_id' => 1,
                'user_id' => 2,
                'permission_level' => 'M'),

            // IT Services
            // John Doe
            array(
                'department_id' => 2,
                'user_id' => 2,
                'permission_level' => 'M'),

            // Human Resources
            // Mark Smith
            array(
                'department_id' => 3,
                'user_id' => 3,
                'permission_level' => 'T'),

            // Human Resources
            // Karl Borlan
            array(
                'department_id' => 3,
                'user_id' => 4,
                'permission_level' => 'M'),

            // Membership Services Team
            // Karl Borlan
            array(
                'department_id' => 11,
                'user_id' => 4,
                'permission_level' => 'M'),

            // Discovery Team
            // Marl Cooper
            array(
                'department_id' => 12,
                'user_id' => 5,
                'permission_level' => 'M'),

            // Financial Services
            // Marl Cooper
            array(
                'department_id' => 4,
                'user_id' => 5,
                'permission_level' => 'T'),

            // Financial Services
            // Mary Jones
            array(
                'department_id' => 4,
                'user_id' => 6,
                'permission_level' => 'M'),

            // Marketing
            // Sels Hunt
            array(
                'department_id' => 5,
                'user_id' => 7,
                'permission_level' => 'M'),

            // Fund Development
            // Taylor Swift
            array(
                'department_id' => 6,
                'user_id' => 8,
                'permission_level' => 'T'),

            // School Aged Services (SAS) Team
            // Taylor Swift
            array(
                'department_id' => 8,
                'user_id' => 8,
                'permission_level' => 'M')

        ));
    }
}
