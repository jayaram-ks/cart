<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
            $table->string('lastname','20')->after('name');
            $table->string('gender','5')->after('lastname');
            $table->string('country','5');
            $table->string('profileimage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table)
        {
            $table->dropColumn('lastname');
            $table->dropColumn('gender');
            $table->dropColumn('country');
            $table->dropColumn('profileimage');
        });
    }
}
