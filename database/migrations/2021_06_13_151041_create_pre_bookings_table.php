<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('slot');
            $table->string('title');
            $table->integer('display');
            $table->integer('real');
            $table->integer('price')->nullable();
            $table->integer('price_2month')->nullable();
            $table->integer('price_3month')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('city');
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
        Schema::dropIfExists('pre_bookings');
    }
}
