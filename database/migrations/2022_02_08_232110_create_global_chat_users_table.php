<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalChatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_chat_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('global_chat_id')->references('id')->on("global_chats")->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on("users")->onDelete('cascade');
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
        // Schema::table('global_chat_user', function (Blueprint $table) {
        //     $table->dropForeign('global_chat_user_global_chat_id_foreign');
        //     $table->dropForeign('global_chat_user_user_id_foreign');
        // });
        Schema::dropIfExists('global_chat_user');
    }
}
