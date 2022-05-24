<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPrivateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('private_chats', function (Blueprint $table) {
            $table->dropIfExists('private_chats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('private_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_one")->references('id')->on("users")->onDelete('cascade');
            $table->foreignId("user_two")->references('id')->on("users")->onDelete('cascade');
            $table->timestamps();
        });
    }
}
