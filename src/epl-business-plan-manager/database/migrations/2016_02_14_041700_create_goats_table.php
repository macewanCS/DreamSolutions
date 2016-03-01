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
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('description');
            $table->smallInteger('priority');
            $table->date('due_date');
            $table->boolean('complete');
            $table->double('budget', 10, 2);
            $table->timestamps();
        });

        Schema::table('goats', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('goats')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('did')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
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
        });
        Schema::drop('goats');
    }
}
