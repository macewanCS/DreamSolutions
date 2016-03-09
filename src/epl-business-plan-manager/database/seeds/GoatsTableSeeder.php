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
                'complete' => false,
				'priority' => 0,
                'goal_type' => 'B',
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
                'complete' => false,
				'priority' => 0,
                'goal_type' => 'B',
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
                'complete' => false,
				'priority' => 0,
                'goal_type' => 'B',
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
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => null ,
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 5
            array(
				'type' => 'O',
				'parent_id' => 1,
    			'description' => 'We identify and meet community needs',
                'complete' => false,
    			'priority' => 1,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2016, 1, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1
			),

            // Action - 6
            array('type' => 'A',
                'parent_id' => 5,
                'description' => 'Review public computing needs and develop strategies to meet those needs',
                'priority' => 3,
                'complete' => true,
                'goal_type' => 'B',
                'due_date' => Carbon\Carbon::createFromDate(2017, 3, 1),
                'budget' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'bid' => 1),

			// Task - 7
            array('type' => 'T',
				'parent_id' => 6,
    			'description' => 'Implement approved recommendations from the 2015 Public Computing Report',
    			'priority' => 2,
                'complete' => true,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2017, 3, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Task - 8
            array('type' => 'T',
				'parent_id' => 6,
    			'description' => 'Upgrade LibOnline to the latest version (4.9).',
                'complete' => true,
    			'priority' => 3,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 12),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Task - 9
            array('type' => 'T',
				'parent_id' => 6,
                'complete' => false,
    			'description' => 'Implement wireless printing.',
    			'priority' => 1,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2016, 5, 3),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 10
            array('type' => 'O',
				'parent_id' => 1,
                'description' => 'We reduce barriers to accessing library services',
                'priority' => 2,
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2016, 7, 4),
				'budget' => 10000,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 11
            array('type' => 'A',
				'parent_id' => 10,
                'description' => 'Establish a fine-free day to take place every second year.',
                'priority' => 2,
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2016, 6, 5),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Task - 12
            array('type' => 'T',
				'parent_id' => 11,
                'description' => 'Provide planning assistance to the Customer Payments team to implement the necessary changes to support a fine-free day',
                'priority' => 1,
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2016, 7, 6),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 13
            array('type' => 'A',
				'parent_id' => 10,
                'description' => 'Extend literacy van services to underserved communities in Edmonton and surrounding areas.',
                'priority' => 2,
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 1),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Task - 14
            array('type' => 'T',
				'parent_id' => 13,
                'description' => 'Aid in the selection, purchase, and configuration of equipment for the fourth literacy van',
                'priority' => 1,
                'complete' => false,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2015, 7, 6),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Objective - 15
            array('type' => 'O',
				'parent_id' => 2,
                'description' => 'The ease of use and integration of content is praised by customers',
                'priority' => 3,
                'complete' => true,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2017, 6, 7),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

			// Action - 16
			array('type' => 'A',
				'parent_id' => 15,
				'description' => 'Implement a single point of discovery for EPL content.',
				'priority' => 2,
                'complete' => true,
                'goal_type' => 'B',
				'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
				'budget' => 0,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
				'bid' => 1),

            // Task - 17
            array('type' => 'T',
                'parent_id' => 16,
                'description' => 'Liaise with Sirsi Dynix to support CMA\'s Single Sign On (SSO) project',
                'priority' => 2,
                'complete' => false,
                'goal_type' => 'B',
                'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
                'budget' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'bid' => 1),

            // IT Goal - 18
            array('type' => 'G',
                'parent_id' => 16,
                'description' => 'IT Services Department Goals',
                'priority' => 2,
                'complete' => false,
                'goal_type' => 'D',
                'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
                'budget' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'bid' => 1),

            // IT Goal - 19
            array('type' => 'O',
                'parent_id' => 18,
                'description' => 'Mobile Device Management (MDM) documentation and rollout',
                'priority' => 1,
                'complete' => false,
                'goal_type' => 'D',
                'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
                'budget' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'bid' => 1),
            
            // IT Goal - 20
            array('type' => 'T',
                'parent_id' => 19,
                'description' => 'Create internal documentation for each profile (i.e. Early literacy and Mini-makerspace) applied to EPL iPads by EPL\'s Mobile Device Management software',
                'priority' => 2,
                'complete' => true,
                'goal_type' => 'D',
                'due_date' => Carbon\Carbon::createFromDate(2018, 8, 7),
                'budget' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'bid' => 1),

		));
    }
}
