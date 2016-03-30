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
            // Action - Review public computing needs and develop strategies to meet those needs
            array(
                'goat_id' => 13,
                'user_id' => 1,
                'user_role' => 'L'),

            // Vicky Varga
            // Task - Implement approved recommendations from the 2015 Public Computing Report
            array(
                'goat_id' => 20,
                'user_id' => 1,
                'user_role' => 'L'),

            // Vicky Varga
            // Task - Provide planning assistance to the Customer Payments team to
            //        implement the necessary changes to support a fine-free day
            array(
                'goat_id' => 12,
                'user_id' => 1,
                'user_role' => 'C'),

            // John Doe
            // Task - Provide planning assistance to the Customer Payments team to
            //        implement the necessary changes to support a fine-free day
            array(
                'goat_id' => 12,
                'user_id' => 2,
                'user_role' => 'L'),

            //John Doe
            // Action - Establish a fine-free day to take place every second year
            array(
                'goat_id' => 11,
                'user_id' => 2,
                'user_role' => 'C'),

            // Mark Smith
            // Task - Aid in the selection, purchase, and configuration of equipment for the fourth literacy van
            array(
                'goat_id' => 14,
                'user_id' => 3,
                'user_role' => 'L'),

            //Mark Smith
            //Task - Pay wireless bill
            array(
                'goat_id' => 9,
                'user_id' => 3,
                'user_role' => 'C'),

            // Sels Hunt
            // Task - Provide planning assistance to the Customer Payments team to
            //        implement the necessary changes to support a fine-free day
            array(
                'goat_id' => 12,
                'user_id' => 7,
                'user_role' => 'C'),

            // Sels Hunt
            // Action - Establish a fine-free day to take place every second year
            array(
                'goat_id' => 11,
                'user_id' => 7,
                'user_role' => 'L'),

            // Vicky Varga
            // Action - Review public computing needs and develop strategies to meet those needs
            array(
                'goat_id' => 6,
                'user_id' => 1,
                'user_role' => 'L'),

            // John Doe
            // Action - Review public computing needs and develop strategies to meet those needs
            array(
                'goat_id' => 6,
                'user_id' => 2,
                'user_role' => 'C'),

            // Marl Cooper
            // Task - Pay wireless bill
            array(
                'goat_id' => 9,
                'user_id' => 5,
                'user_role' => 'L'),

            // Karl Borlan
            // Task - Hire more people to help upgrade LibOnline to the latest version (4.9)
            array(
                'goat_id' => 8,
                'user_id' => 3,
                'user_role' => 'L'),

            // Vicky Varga
            // Task - Implement approved recommendations from the 2015 Public Computing Report
            array(
                'goat_id' => 7,
                'user_id' => 1,
                'user_role' => 'L'),

            // Marl Cooper
            // Action -	Implement a single point of discovery for EPL content
            array(
                'goat_id' => 16,
                'user_id' => 5,
                'user_role' => 'L'),

            // Vicky Varga
            // Task - Liaise with Sirsi Dynix to support CMA's Single Sign On (SSO) project
            array(
                'goat_id' => 17,
                'user_id' => 1,
                'user_role' => 'L'),

        ));
    }
}
