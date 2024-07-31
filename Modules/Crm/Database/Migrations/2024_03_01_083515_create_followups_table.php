<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->foreign('insert_user_id')->on('users')->references('id')->onDelete('cascade');
            $table->string('comment',200)->nullable();
            $table->tinyInteger('talktime');
            $table->string('tags',200)->nullable();
            $table->string('nextfollowup_date_fa',200)->nullable();
            $table->text('sms')->nullable();
            $table->boolean('flag')->default(0);
            $table->string('date_fa',20)->nullable();
            $table->string('time_fa',20)->nullable();
            $table->string('datetime_fa')->nullable();
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
        Schema::dropIfExists('followups');
    }
}
