<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< 0a97bbc50ab43c122f3d1f57fcbbed20cbc1d8d8:src/epl-business-plan-manager/database/migrations/2016_02_15_000429_create_business_plan_table.php
        Schema::create('business_plan', function (Blueprint $table) {
            $table->increments('id');
=======
        Schema::create('business_plans', function (Blueprint $table) {
            $table->increments('bid');
>>>>>>> Add dashboard view, Make migration tables plural:src/epl-business-plan-manager/database/migrations/2016_02_14_000002_create_business_plan_table.php
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_plans');
    }
}
