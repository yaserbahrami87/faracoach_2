<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',200)->nullable()->unique();
            $table->string('shortlink',200)->nullable()->unique();
            $table->string('image')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->string('fi',15)->nullable();
            $table->string('fi_off')->nullable();
            $table->tinyInteger('type_peymant_id')->nullable();
            $table->string('prepayment',15)->default(0);
            $table->tinyInteger('peymant_off')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
