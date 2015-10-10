<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function(Blueprint $table) {
            $table->integer('id', 10)->unique();
            $table->string('name')->nullable();
            $table->string('type', 5);
            $table->text('description')->nullable();
            $table->string('semester', 10);
            $table->integer('max_student')->default(0);
            $table->integer('registered_student')->default(0);
            $table->string('course_id')->nullable();
            $table->string('enroll_key');
            $table->string('user_id');
            $table->softDeletes();
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
        Schema::drop('classes');
    }
}
