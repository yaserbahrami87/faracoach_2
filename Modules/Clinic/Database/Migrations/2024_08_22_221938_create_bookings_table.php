<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id')->nullable();
            $table->foreign('coach_id')->on('coaches')->references('id')->onDelete('cascade');
            $table->string('start_date',10)->nullable();
            $table->string('start_time',5)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('date_fa',10)->nullable();
            $table->string('time_fa',8)->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
