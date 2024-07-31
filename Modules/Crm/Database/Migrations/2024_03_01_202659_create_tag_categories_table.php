<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category',50)->nullable()->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('tag_categories',function(Blueprint $table)
        {
            $table->foreign('parent_id')->on('tag_categories')->references('id')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_categories');
    }
}
