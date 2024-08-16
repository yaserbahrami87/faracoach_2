<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->unique();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->text('education_background')->nullable();
            $table->text('researches')->nullable();
            $table->text('certificates')->nullable();
            $table->text('experience')->nullable();
            $table->text('skills')->nullable();
            $table->integer('count_meeting')->nullable();
            $table->unsignedBigInteger('coach_type_id')->nullable();
            $table->foreign('coach_type_id')->on('coach_types')->references('id')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->integer('fi')->default(0);
            $table->string('address',200)->nullable();
            $table->string('online_platform',200)->nullable();
            $table->string('tel',15)->nullable();
            $table->boolean('today_meeting')->default(0);
            $table->boolean('confirm_faracoach')->default(0);
            $table->boolean('student_meeting')->default(0);
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
        Schema::dropIfExists('coaches');
    }
}
