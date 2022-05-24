<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessagesForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('chat_type');
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_id_foreign');
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->text('chat_type')->after('chat_id');
            $table->unsignedInteger('user_id')->change();
        });
    }
}
