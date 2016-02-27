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
    		array('type' => 'N', 'parent_id' => 1, 'description' => 'NULL PARENT FOR GOALS', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'G', 'parent_id' => 1, 'description' => 'Transform Communities', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'G', 'parent_id' => 1, 'description' => 'Evolve our digital environment', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'G', 'parent_id' => 1, 'description' => 'Act as a catalyst for learning, discovery and creating', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'G', 'parent_id' => 1, 'description' => 'Transition the way we do business', 'priority' => 0, 'due_date' => null , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		// 5 
    		array('type' => 'O', 'parent_id' => 2, 
    			'description' => 'Together with our community we provide successful, meaningful services that are highly rates and heavily used', 
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'O', 'parent_id' => 4, 
    			'description' => 'There are established partnerships to support programs and services.', 
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'O', 'parent_id' => 4, 
    			'description' => 'We have a vibrant fund development program with increase donor diversity, and increased value of donations and sponsorships.', 
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'O', 'parent_id' => 4, 
    			'description' => 'Create a framework to intice high end speakers to come to EPL at no or reduced cost', 
    			'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 6, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 4, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 4, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 4, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 4, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
    		array('type' => 'A', 'parent_id' => 4, 'description' => '', 'priority' => 0, 'due_date' => Carbon\Carbon::now() , 'budget' => 0, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),

    ));
    }
}
