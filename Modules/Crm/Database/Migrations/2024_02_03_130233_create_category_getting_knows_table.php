<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryGettingKnowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_getting_knows', function (Blueprint $table) {
            $table->id();
            $table->string('category',250)->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::table('category_getting_knows',function (Blueprint $table)
        {
           $table->foreign('parent_id')->on('category_getting_knows')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_getting_knows');
    }
}
