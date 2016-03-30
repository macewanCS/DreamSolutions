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

            // 1 - Vicky Varga
            array(
                'first_name'=>'Vicky',
                'last_name' => 'Varga',
                'username' => 'vargav',
                'password' => bcrypt('password'),
                'email'=>'vargav@epl.ca',
                'is_admin' => false,
                'overdue' => 0,
                'completed' => 1,
                'in_progress' => 2,
                'remember_token' => true,
                'is_active' => true,
                'is_bplead' => false,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()),


            // 2 - John Doe
            array(
                 'first_name'=>'John',
                 'last_name' => 'Doe',
                 'username' => 'doej',
                 'password' => bcrypt('password'),
                 'email'=>'john@epl.ca',
                 'is_admin' => false,
                 'overdue' => 3,
                 'completed' => 1,
                 'in_progress' => 1,
                 'remember_token' => true,
                 'is_active' => true,
                 'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),


            // 3 - Mark Smith
            array(
                 'first_name'=>'Mark',
                 'last_name' => 'Smith',
                 'username' => 'smithm',
                 'password' => bcrypt('password'),
                 'email'=>'mark@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => false,
                 'is_bplead' => true,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 4 - Karl Borlan
            array(
                 'first_name'=>'Karl',
                 'last_name' => 'Borlan',
                 'username' => 'borlank',
                 'password' => bcrypt('password'),
                 'email'=>'karl@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => true,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 5 - Marl Cooper
            array(
                 'first_name'=>'Marl',
                 'last_name' => 'Cooper',
                 'username' => 'cooperm',
                 'password' => bcrypt('password'),
                 'email'=>'marl@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => true,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 6 - Mary Jones
            array(
                 'first_name'=>'Mary',
                 'last_name' => 'Jones',
                 'username' => 'jonesm',
                 'password' => bcrypt('password'),
                 'email'=>'mary@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => false,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 7 - Sels Hunt
            array(
                 'first_name' =>'Sels',
                 'last_name' => 'Hunt',
                 'username' => 'hunts',
                 'password' => bcrypt('password'),
                 'email'=>'sels@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => true,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 8 - Taylor Swift
            array(
                 'first_name'=>'Taylor',
                 'last_name' => 'Swift',
                 'username' => 'swiftt',
                 'password' => bcrypt('password'),
                 'email'=>'taylor@epl.ca',
                 'is_admin' => false,
                 'overdue' => rand(0, 4),
                 'completed' => rand(0, 26),
                 'in_progress' => rand(2, 5),
                 'remember_token' => true,
                 'is_active' => true,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),

            // 9 - Ad Min
            array(
                 'first_name'=>'Ad',
                 'last_name' => 'Min',
                 'username' => 'admin',
                 'password' => bcrypt('supersecret'),
                 'email'=>'admin@epl.ca',
                 'is_admin' => true,
                 'overdue' => 0,
                 'completed' => 0,
                 'in_progress' => 0,
                 'remember_token' => true,
                 'is_active' => true,
                'is_bplead' => false,
                 'created_at' => Carbon\Carbon::now(),
                 'updated_at' => Carbon\Carbon::now()),
          ));
    }
}
