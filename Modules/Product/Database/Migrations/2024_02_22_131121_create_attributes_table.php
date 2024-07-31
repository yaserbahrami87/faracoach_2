<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute')->nullable()->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('attribute_product', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->foreign('attribute_id')->on('attributes')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');
            $table->unique(['attribute_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_product');
        Schema::dropIfExists('attributes');
    }
}
