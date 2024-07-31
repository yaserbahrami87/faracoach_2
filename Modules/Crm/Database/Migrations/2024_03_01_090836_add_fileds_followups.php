<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiledsFollowups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('followups', function (Blueprint $table) {
            $table->unsignedBigInteger('problemfollowup_id')->nullable();
            $table->integer('status_followups')->nullable();
            $table->foreign('problemfollowup_id')->on('problemfollowups')->references('id')->onDelete('cascade');
//            $table->foreign('status_followups')->on('user_types')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followups', function (Blueprint $table) {
//            $table->dropForeign(['status_followups']);
            $table->dropForeign(['problemfollowup_id']);
//            $table->dropColumn('status_followups');
            $table->dropColumn('problemfollowup_id');
        });
    }
}
