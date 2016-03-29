<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeptIdToGoats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goats', function (Blueprint $table) {
            $table->integer('dept_id')->unsigned()->index()->nullable();
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
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
            $table->dropForeign('goats_dept_id_foreign');
        });
    }
}
