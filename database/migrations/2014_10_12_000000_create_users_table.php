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
            $table->string('hust_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('activation_code', 100)->nullable();
            $table->smallInteger('status');
            $table->string('slug')->unique();
            // Columns for polymorphic relationship of User
            $table->integer('userable_id');
            $table->string('userable_type');
            $table->integer('profile_id');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('active')->default(false);
            $table->softDeletes();
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
