<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_one")->references('id')->on("users")->onDelete('cascade');
            $table->foreignId("user_two")->references('id')->on("users")->onDelete('cascade');
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
        // Schema::table('friends', function (Blueprint $table) {
        //     $table->dropForeign('friends_user_one_foreign');
        //     $table->dropForeign('friends_user_two_foreign');
        // });
        Schema::dropIfExists('friends');
    }
}
