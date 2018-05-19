<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auction_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('max_price')->nullable();
            $table->boolean('active')->default(true);

            $table->foreign('auction_id')->references('id')->on('auction')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bet');
    }
}
