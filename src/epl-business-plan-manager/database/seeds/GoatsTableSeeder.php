<?php

use Illuminate\Database\Seeder;

class GoatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goats')->insert(array(

			// Goal - 1
            array(
				'type' => 'G',
				'parent_id' => null,
				'description' => 'Transform Communities',
				'priority' => 0,
				'due_date' => null ,
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Goal - 2
            array(
				'type' => 'G',
				'parent_id' => null,
				'description' => 'Evolve our digital environment',
				'priority' => 0,
				'due_date' => null ,
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Goal - 3
            array(
				'type' => 'G',
				'parent_id' => null,
				'description' => 'Act as a catalyst for learning, discovery and creating',
				'priority' => 0,
				'due_date' => null ,
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Goal - 4
            array(
				'type' => 'G',
				'parent_id' => null,
				'description' => 'Transition the way we do business',
				'priority' => 0,
				'due_date' => null ,
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 5
            array(
				'type' => 'O',
				'parent_id' => 2,
    			'description' => 'Together with our community we provide successful, meaningful services that are highly rates and heavily used',
    			'priority' => 0,
				'due_date' => Carbon\Carbon::createFromDate(2016, 1, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1
			),

			// Objective - 6
            array('type' => 'O',
				'parent_id' => 1,
    			'description' => 'We Reduce barriers to accessing library services',
    			'priority' => 0,
				'due_date' => Carbon\Carbon::createFromDate(2017, 3, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 7
            array('type' => 'O',
				'parent_id' => 3,
    			'description' => 'Online services are highly used and valued',
    			'priority' => 0,
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 12),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 8
            array('type' => 'O',
				'parent_id' => 1,
    			'description' => 'We identify and meet community needs',
    			'priority' => 0,
				'due_date' => Carbon\Carbon::createFromDate(2016, 5, 3),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 9
            array('type' => 'A',
				'parent_id' => 6,
                'description' => 'Host EPL Day celebrations at all branches on March 13, 2016',
                'priority' => 2,
				'due_date' => Carbon\Carbon::createFromDate(2016, 7, 4),
				'budget' => 10000,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 10
            array('type' => 'A',
				'parent_id' => 6,
                'description' => 'Evaluate the 2016 event and create a proposal for the 2017 by November 30, 2016.',
                'priority' => 2,
				'due_date' => Carbon\Carbon::createFromDate(2016, 6, 5),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 11
            array('type' => 'A',
				'parent_id' => 7,
                'description' => 'Live stream two forward thinking speaker series events in 2016',
                'priority' => 1,
				'due_date' => Carbon\Carbon::createFromDate(2016, 7, 6),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 12
            array('type' => 'A',
				'parent_id' => 7,
                'description' => 'Create best practice document around event sharing and cost sharing with partner organizations',
                'priority' => 1,
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 13
            array('type' => 'A',
				'parent_id' => 8,
                'description' => 'Review public computing needs and develop strategies to meet those needs.',
                'priority' => 1,
				'due_date' => Carbon\Carbon::createFromDate(2016, 7, 6),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Task - 14
            array('type' => 'T',
				'parent_id' => 13,
                'description' => 'Implement approved recommendations from the 2015 Public Computing Report',
                'priority' => 2,
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 7),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 15
			array('type' => 'A',
				'parent_id' => 6,
				'description' => 'Implement lending machines in underserved areas of Edmonton.',
				'priority' => 2,
				'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

		));
    }
}
