<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title',200)->nullable()->unique();
            $table->text('image')->nullable();
            $table->string('description',200)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('clinic_categories', function (Blueprint $table) {
            $table->foreign('parent_id')->on('clinic_categories')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('clinic_categories');

    }
}
