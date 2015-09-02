<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('department')->nullable();
            $table->string('school')->nullable();
            $table->string('office_address')->nullable();
            $table->string('work_email', 60)->nullable();
            $table->string('telephone', 25)->nullable();
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
        Schema::drop('lecturers');
    }
}
