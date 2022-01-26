<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nickname");
            $table->string("role");
            $table->string("avatar_image")->nullable();
            $table->boolean("subscribe");
            $table->integer("money")->nullable();
            $table->unsignedBigInteger("read_episodes")->nullable();
            $table->unsignedBigInteger("liked")->nullable();
            $table->unsignedBigInteger("comments")->nullable();
            $table->json("reading")->nullable(); // mangas id
            $table->json("will_read")->nullable();
            $table->json("postponed")->nullable();
            $table->string("vk_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
