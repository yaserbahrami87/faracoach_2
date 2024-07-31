<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event',200)->nullable();
            $table->string('shortlink',200)->unique()->nullable();
            $table->longText('event_text')->nullable();
            $table->string('description',200)->nullable();
            $table->integer('fi')->nullable();
            $table->string('image',200)->nullable();
            $table->integer('capacity')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('address',200)->nullable();
            $table->longText('heading')->nullable();
            $table->string('contacts',200)->nullable();
            $table->string('faq',200)->nullable();
            $table->string('video',200)->nullable();
            $table->string('links',200)->nullable();
            $table->string('expire_date',11)->nullable();
            $table->string('start_date',11)->nullable();
            $table->string('end_date',11)->nullable();
            $table->string('start_time',8)->nullable();
            $table->string('end_time',8)->nullable();
            $table->string('duration',100)->nullable();
            $table->string('options',200)->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
