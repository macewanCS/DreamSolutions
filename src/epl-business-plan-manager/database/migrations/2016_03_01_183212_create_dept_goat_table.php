<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptGoatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dept_goat', function(Blueprint $table) {
            $table->integer('dept_id')->unsigned()->index();
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');

            $table->integer('goat_id')->unsigned()->index();
            $table->foreign('goat_id')->references('id')->on('goats')->onDelete('cascade');

            // Collaborator 'C' or Lead 'L'
            $table->char('dept_role');

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
        Schema::drop('dept_goat');
    }
}
