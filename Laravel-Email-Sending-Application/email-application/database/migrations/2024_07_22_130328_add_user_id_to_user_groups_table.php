<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToUserGroupsTable extends Migration
{
    public function up()
    {
        Schema::table('user_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // or another suitable position
            $table->foreign('user_id')->references('id')->on('users'); // Add a foreign key constraint if needed
        });
    }

    public function down()
    {
        Schema::table('user_groups', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint if needed
            $table->dropColumn('user_id');
        });
    }
}
