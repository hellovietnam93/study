<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('credit', 5, 2);
            $table->decimal('credit_fee', 5, 2)->nullable();
            $table->decimal('theory_duration', 6, 2)->nullable();
            $table->decimal('exercise_duration', 6, 2)->nullable();
            $table->decimal('practice_duration', 6, 2)->nullable();
            $table->decimal('weight', 6, 2)->nullable();
            $table->string('en_name')->nullable();
            $table->string('abbr_name')->nullable();
            $table->string('coures_group')->nullable();
            $table->string('language', 5)->nullable();
            $table->text('evaludation')->nullable();

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
        Schema::drop('courses');
    }
}
