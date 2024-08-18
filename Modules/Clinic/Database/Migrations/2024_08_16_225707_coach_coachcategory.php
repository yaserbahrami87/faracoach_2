<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoachCoachcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_coachcategory', function (Blueprint $table) {
            $table->unsignedBigInteger('coach_id')->nullable();
            $table->foreign('coach_id')->on('coaches')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('coachcategory_id')->nullable();
            $table->foreign('coachcategory_id')->on('coach_categories')->references('id')->onDelete('cascade');
            $table->unique(['coach_id','coachcategory_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coach_coachcategory');
    }
}
