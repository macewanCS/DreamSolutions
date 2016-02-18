<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goat', function (Blueprint $table) {
            $table->increments('goat_id');
	        $table->char('type');
	        $table->integer('parentId');
	        $table->string('description');
	        $table->smallInteger('priority');
	        $table->timestamp('dueDate');
	        $table->double('budget', 10, 2);
	        $table->timestamps();
            $table->foreign('goat_id')->references('bid')->on('business_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goat');
    }
}
