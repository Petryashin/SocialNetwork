<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id")->primary();
            $table->datetime("birthday")->nullable();
            $table->text("education")->nullable();
            // Пока как фото профиля
            $table->string("photo")->nullable();
            $table->string("city")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->timestamps();
            $table->foreign("user_id")->references('id')->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
