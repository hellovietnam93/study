<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table)
        {
            $table->integer('id')->unique();
            $table->string('cohort', 10);
            $table->string('program')->nullable();
            $table->string('class')->nullable();
            $table->string('school')->nullable();
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
        Schema::drop('students');
    }
}
