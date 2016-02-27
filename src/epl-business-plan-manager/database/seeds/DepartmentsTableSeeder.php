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
        DB::table('departments')->insert([
        	'name' => str_random(10),
        	'isTeam' => rand(0, 1)
        	])
    }
}
