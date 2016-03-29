<?php

use Illuminate\Database\Seeder;

class BusinessPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_plans')->insert(array(

            array(
                'start' => Carbon\Carbon::createFromDate(2012, 1, 1, 'America/Edmonton'),
                'end' => Carbon\Carbon::createFromDate(2014, 12, 31, 'America/Edmonton')),

            array(
                'start' => Carbon\Carbon::createFromDate(2014, 2, 5, 'America/Edmonton'),
                'end' => Carbon\Carbon::createFromDate(2016, 2, 5, 'America/Edmonton')),

            array(
                'start' => Carbon\Carbon::createFromDate(2016, 2, 5, 'America/Edmonton'),
                'end' => Carbon\Carbon::createFromDate(2018, 2, 5, 'America/Edmonton')),
        ));
    }
}
