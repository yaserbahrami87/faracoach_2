<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->unsignedBigInteger('parent_id')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_categories', function (Blueprint $table) {
            $table->foreign('parent_id')->on('tag_categories')->references('id');
            $table->unsignedBigInteger('parent_id')->nullable()->change();
        });
    }
}
