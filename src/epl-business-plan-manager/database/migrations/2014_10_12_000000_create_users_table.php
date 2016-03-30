<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('is_admin');
            $table->integer('in_progress');
            $table->integer('completed');
            $table->integer('overdue');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('is_active');
            $table->boolean('is_bplead');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
