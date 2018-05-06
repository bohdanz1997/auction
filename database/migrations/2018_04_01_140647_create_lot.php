<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('birth_date')->nullable();
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();
            $table->string('main_picture')->nullable();
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('breed_id')->nullable();
            $table->unsignedInteger('gender_id')->nullable();
            $table->unsignedInteger('cert_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('breed_id')->references('id')->on('breed');
            $table->foreign('gender_id')->references('id')->on('gender');
            $table->foreign('cert_id')->references('id')->on('cert');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot');
    }
}
