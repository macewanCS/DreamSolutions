<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentGoatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_goat', function(Blueprint $table) {
            $table->integer('department_id')->unsigned()->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->integer('goat_id')->unsigned()->index();
            $table->foreign('goat_id')->references('id')->on('goats')->onDelete('cascade');

            // Collaborator 'C' or Lead 'L'
            $table->char('department_role');

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
        Schema::drop('department_goat');
    }
}
