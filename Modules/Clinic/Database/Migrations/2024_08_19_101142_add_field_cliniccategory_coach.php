<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldCliniccategoryCoach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliniccategory_coach', function (Blueprint $table) {
            $table->unsignedBigInteger('request_portal_id')->nullable();
            $table->foreign('request_portal_id')->on('request_portals')->references('id')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliniccategory_coach', function (Blueprint $table) {
            $table->dropForeign(['request_portal_id']);
            $table->dropColumn('status');
            $table->dropColumn('request_portal_id');
        });
    }
}
