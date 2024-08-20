<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_send')->nullable();
            $table->foreign('user_id_send')->on('users')->references('id')->onDelete('cascade');
            $table->string('subject',200)->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id_recieve')->nullable();
            $table->foreign('user_id_recieve')->on('users')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_id_answer')->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',10)->nullable();
            $table->string('type',200)->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('ticket_id_answer')->on('tickets')->references('id')->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['message_id_answer']);
        });
        Schema::dropIfExists('tickets');
    }
}
