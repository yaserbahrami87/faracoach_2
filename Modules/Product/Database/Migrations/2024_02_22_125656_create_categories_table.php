<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable()->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
           $table->unsignedBigInteger('category_id')->nullable();
           $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
           $table->unsignedBigInteger('product_id')->nullable();
           $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
           $table->unique(['category_id','product_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('categories');
    }
}
