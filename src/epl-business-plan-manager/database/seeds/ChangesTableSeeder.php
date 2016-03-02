<?php

use Illuminate\Database\Seeder;

class ChangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('changes')->insert(array(

            // 1
            // Vicky Varga
            // Review public computing needs and develop strategies to meet those needs.
            array(
                'change_type' => 'N',
                'description' => '10 locations now have making tech and iMacs roll out shortly.',
                'goat_id' => 13,
                'user_id' => 1),

            // 2
            // Vicky Varga
            // Implement approved recommendations from the 2015 Public Computing Report
            array(
                'change_type' => 'S',
                'description' => 'Projects in each of 2014, 2015, 2016.',
                'goat_id' => 14,
                'user_id' => 1),

            // 3
            // John Doe
            // Live stream two forward thinking speaker series events in 2016
            array(
                'change_type' => 'N',
                'description' => 'Stanley said to talk with Billy who has some great ideas',
                'goat_id' => 11,
                'user_id' => 2),

            // 4
            // Vicky Varga
            // Evaluate the 2016 event and create a proposal for the 2017 by November 30, 2016.
            array(
                'change_type' => 'S',
                'description' => 'Completed',
                'goat_id' => 10,
                'user_id' => 1),

            // 5
            // Mark Smith
            // Host EPL Day celebrations at all branches on March 13, 2016
            array(
                'change_type' => 'N',
                'description' => 'Talked to John Doe who told me something useful.',
                'goat_id' => 9,
                'user_id' => 3)

        ));
    }
}
