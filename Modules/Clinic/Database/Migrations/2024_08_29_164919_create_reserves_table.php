<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->foreign('booking_id')->on('bookings')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('cliniccategory_id')->nullable();
            $table->foreign('cliniccategory_id')->on('clinic_categories')->references('id')->onDelete('cascade');
            $table->string('subject',200)->nullable();
            $table->string('description',200)->nullable();
            $table->tinyInteger('type_booking')->nullable();
            $table->integer('fi')->nullable();
            $table->integer('off')->nullable();
            $table->string('type_discount',100)->nullable();
            $table->string('coupon',200)->nullable();
            $table->string('final_fi')->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
            $table->string('result')->nullable();
            $table->tinyInteger('rate')->nullable();
            $table->string('feedback',200)->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('reserves');
    }
}
