<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('pid');
            $table->integer('userid')->unsigned();
            $table->integer('deptid')->unsigned();
            $table->foreign('userid')->references('uid')->on('users');
            $table->foreign('deptid')->references('did')->on('departments');
            $table->char('permission_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}
