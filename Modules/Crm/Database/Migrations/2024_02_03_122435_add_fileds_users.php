<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiledsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username',200)->nullable()->unique();
            $table->string('fname_en',30)->nullable();
            $table->string('lname_en',30)->nullable();
            $table->boolean('sex')->nullable();
            $table->string('datebirth',11)->nullable();
            $table->string('father',100)->nullable();
            $table->string('codemelli',15)->nullable()->unique();
            $table->string('shenasname',20)->nullable();
            $table->string('born',30)->nullable();
            $table->string('education',20)->nullable();
            $table->string('reshteh',50)->nullable();
            $table->string('job',50)->nullable();
            $table->string('organization',100)->nullable();
            $table->string('jobside',30)->nullable();
            $table->string('address',255)->nullable();
            $table->string('personal_image',255)->nullable();
            $table->string('shenasnameh_image',255)->nullable();
            $table->string('cartmelli_image',255)->nullable();
            $table->string('education_image',255)->nullable();
            $table->string('resume',255)->nullable();
            $table->boolean('married')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->string('resource',30)->nullable();
            $table->unsignedBigInteger('introduced')->nullable();
            $table->unsignedBigInteger('followby_expert')->nullable();
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->string('telegram',50)->nullable();
            $table->string('instagram',50)->nullable();
            $table->string('linkedin',250)->nullable();
            $table->string('aboutme',250)->nullable();
            $table->timestamp('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('fname_en');
            $table->dropColumn('lname_en');
            $table->dropColumn('sex');
            $table->dropColumn('datebirth');
            $table->dropColumn('father');
            $table->dropColumn('codemelli');
            $table->dropColumn('shenasname');
            $table->dropColumn('born');
            $table->dropColumn('education');
            $table->dropColumn('reshteh');
            $table->dropColumn('job');
            $table->dropColumn('organization');
            $table->dropColumn('jobside');
            $table->dropColumn('address');
            $table->dropColumn('personal_image');
            $table->dropColumn('shenasnameh_image');
            $table->dropColumn('cartmelli_image');
            $table->dropColumn('education_image');
            $table->dropColumn('resume');
            $table->dropColumn('married');
            $table->dropColumn('type');
            $table->dropColumn('resource');
            $table->dropColumn('introduced');
            $table->dropColumn('followby_expert');
            $table->dropColumn('insert_user_id');
            $table->dropColumn('telegram');
            $table->dropColumn('instagram');
            $table->dropColumn('linkedin');
            $table->dropColumn('aboutme');
            $table->dropColumn('last_login_at');
        });
    }
}
