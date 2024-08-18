<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClinicCategoryCoach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliniccategory_coach', function (Blueprint $table) {
            $table->unsignedBigInteger('cliniccategory_id')->nullable();
            $table->foreign('cliniccategory_id')->on('clinic_categories')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('coach_id')->nullable();
            $table->foreign('coach_id')->on('coaches')->references('id')->onDelete('cascade');
            $table->unique(['coach_id','cliniccategory_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliniccategory_coach');
    }
}
