<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_plan_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
            $table->decimal('start_price')->nullable();
            $table->decimal('max_price')->nullable();
            $table->integer('step')->nullable();
            $table->text('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction');
    }
}
