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
    		array('type' => 'N', 'parent_id' => 1, 'description' => 'NULL PARENT FOR GOALS', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'G', 'parent_id' => 1, 'description' => 'Transform Communities', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'G', 'parent_id' => 1, 'description' => 'Evolve our digital environment', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'G', 'parent_id' => 1, 'description' => 'Act as a catalyst for learning, discovery and creating', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'G', 'parent_id' => 1, 'description' => 'Transition the way we do business', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'O', 'parent_id' => 2,
    			'description' => 'Together with our community we provide successful, meaningful services that are highly rates and heavily used',
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'O', 'parent_id' => 5,
    			'description' => 'There are established partnerships to support programs and services.',
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'O', 'parent_id' => 5,
    			'description' => 'We have a vibrant fund development program with increase donor diversity, and increased value of donations and sponsorships.',
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'O', 'parent_id' => 5,
    			'description' => 'Create a framework to intice high end speakers to come to EPL at no or reduced cost',
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'A', 'parent_id' => 6,
                'description' => 'Host EPL Day celebrations at all branches on March 13, 2016',
                'priority' => 2, 'due_date' => Carbon\Carbon::now() , 'budget' => 10000, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'A', 'parent_id' => 6,
                'description' => 'Evaluate the 2016 event and create a proposal for the 2017 by November 30, 2016.',
                'priority' => 2, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'A', 'parent_id' => 7,
                'description' => 'Obtain $10,000 in shared cost partnerships for 2016 events.',
                'priority' => 1, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'A', 'parent_id' => 7,
                'description' => 'Create best practice document around event sharing and cost sharing with partner organizations',
                'priority' => 1, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'A', 'parent_id' => 8,
                'description' => 'Obtain $40,000 in sponsorships through the FTSS in 2016',
                'priority' => 1, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

            array('type' => 'T', 'parent_id' => 9,
                'description' => 'Complete a request by August 1, 2016 for Bill Gates to speak at EPL at no cost (travel fees excluded)',
                'priority' => 2, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'bid' => 1),

    ));
    }
}
