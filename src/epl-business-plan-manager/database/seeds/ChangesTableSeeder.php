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

            array(
                'change_type' => ,
                'description' => ,
                'goat_id' => ,
                'user_id' => ),

            array(
                'change_type' => ,
                'description' => ,
                'goat_id' => ,
                'user_id' => ),

            array(
                'change_type' => ,
                'description' => ,
                'goat_id' => ,
                'user_id' => ),

            array(
                'change_type' => ,
                'description' => ,

                'goat_id' => ,
                'user_id' => ),

            array(
                'change_type' => ,
                'description' => ,
                'goat_id' => ,
                'user_id' => )

        ));
    }
}
