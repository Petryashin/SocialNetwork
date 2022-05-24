<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsGlobalChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_chats', function (Blueprint $table) {
            $table->string('chat_type');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->text('photo')->nullable();
            $table->timestamp('last_modified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_chats', function (Blueprint $table) {
            $table->dropColumn('chat_type');
            $table->dropColumn('owner_id');
            $table->dropColumn('photo');
            $table->dropColumn('last_modified');
        });
    }
}
