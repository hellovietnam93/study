<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users', function(Blueprint $table)
        {
            $table->string('id', 10)->unique();
            $table->string('name');
            $table->date('birthday');
            $table->string('program');
            $table->string('class_name');
            $table->string('status');
            $table->string('cohort');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_users');
    }
}
