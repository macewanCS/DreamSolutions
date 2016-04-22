<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goats', function (Blueprint $table) {
            $table->increments('id');
            $table->char('type');
            $table->char('goal_type');
            $table->string('description');
            $table->string('success_measure');
            $table->smallInteger('priority')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('complete')->nullable();
            $table->double('budget', 10, 2)->nullable();
            $table->timestamps();

            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->foreign('parent_id')->references('id')->on('goats')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('bid')->unsigned()->index();
            $table->foreign('bid')->references('id')->on('business_plans')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goats', function (Blueprint $table) {
            $table->dropForeign('goats_parent_id_foreign');
            $table->dropForeign('goats_bid_foreign');
        });


        Schema::drop('goats');
    }


}
