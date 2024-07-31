<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course',200)->nullable();
            $table->string('shortlink',200)->unique()->nullable();
            $table->string('image',200)->nullable();
            $table->tinyInteger('duration')->default(0);
            $table->string('duration_date',20)->nullable();
            $table->string('start',20)->nullable();
            $table->string('end',20)->nullable();
            $table->string('course_days',200)->nullable();
            $table->string('course_times',200)->nullable();
            $table->text('infocourse')->nullable();
            $table->string('exam',100)->nullable();
            $table->integer('fi')->nullable();
            $table->unsignedBigInteger('type_peymant_id')->nullable();
            $table->integer('prepayment')->default(0);
            $table->tinyInteger('peymant_off')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('special')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
