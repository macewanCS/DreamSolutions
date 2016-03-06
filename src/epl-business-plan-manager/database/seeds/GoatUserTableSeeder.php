<?php

use Illuminate\Database\Seeder;

class GoatUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goat_user')->insert(array(

            // Vicky Varga
            // Action - Review public computing needs and develop strategies to meet those needs.
            array(
                'goat_id' => 13,
                'user_id' => 1,
                'user_role' => 'L'),

            // Task - Implement approved recommendations from the 2015 Public Computing Report
            array(
                'goat_id' => 14,
                'user_id' => 1,
                'user_role' => 'L'),

            // Action - Implement lending machines in underserved areas of Edmonton.
            array(
                'goat_id' => 15,
                'user_id' => 1,
                'user_role' => 'C'),

            // John Doe
            // Action - Create best practice document around event sharing and cost sharing with partner organizations
            array(
                'goat_id' => 12,
                'user_id' => 2,
                'user_role' => 'L')

        ));
    }
}
