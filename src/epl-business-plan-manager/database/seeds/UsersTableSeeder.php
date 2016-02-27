<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert(array(
    		array('first_name'=>'Vicky','last_name' => 'Varga', 'password' => bcrypt('password'), 'email'=>'vargav@edmonton.ca', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
	         array('first_name'=>'john','last_name' => 'doe', 'password' => 'password', 'email'=>'john@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name'=>'mark','last_name' => 'smith', 'password' => bcrypt('test'), 'email'=>'mark@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name'=>'Karl','last_name' => 'borlan', 'password' => bcrypt('pass'), 'email'=>'karl@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name'=>'marl','last_name' => 'cooper', 'password' => bcrypt('tester'), 'email'=>'marl@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name'=>'mary','last_name' => 'jones', 'password' => bcrypt('test123'), 'email'=>'mary@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name' =>'sels','last_name' => 'hunt', 'password' => bcrypt('test'), 'email'=>'sels@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),
             array('first_name'=>'taylor','last_name' => 'swift', 'password' => bcrypt('1234'), 'email'=>'taylor@clivern.com', 'remember_token' => true, 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()),

          ));
    }
}
