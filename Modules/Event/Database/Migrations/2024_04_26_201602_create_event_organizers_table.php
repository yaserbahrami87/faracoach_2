<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_organizers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->unique();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->string('biography',200)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('event_eventorganizer', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->on('events')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('eventorganizer_id')->nullable();
            $table->foreign('eventorganizer_id')->on('event_organizers')->references('id')->onDelete('cascade');
            $table->unique(['event_id','eventorganizer_id']);
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_eventorganizer');
        Schema::dropIfExists('event_organizers');

    }
}
