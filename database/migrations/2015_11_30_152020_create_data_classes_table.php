<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_classes', function(Blueprint $table)
        {
            $table->string('semester');
            $table->string('student_id');
            $table->integer('class_id');
            $table->string('class_type');
            $table->string('course_id');
            $table->string('course_title');
            $table->string('reg_status');
            $table->timestamps();

            $table->primary(['semester', 'student_id', 'class_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_classes');
    }
}
