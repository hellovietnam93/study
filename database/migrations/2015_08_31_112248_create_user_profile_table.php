<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('middle_name', 30)->nullable();
            $table->string('last_name', 30);
            $table->string('display_name', 50)->nullable();
            $table->boolean('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('avatar')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('language',15)->nullable()->default('Vietnamese');
            $table->string('country', 30)->nullable()->default('Việt Nam');
            $table->text('about');
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
        Schema::drop('user_profile');
    }
}
