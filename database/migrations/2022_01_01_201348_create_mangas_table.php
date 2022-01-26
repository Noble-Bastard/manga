<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title");
            $table->string("alter_title");
            $table->string("type");
            $table->string("status");
            $table->text("about");
            $table->string("image");
            $table->json("genre");
            $table->integer("stars")->nullable();
            $table->unsignedBigInteger("views")->nullable();
            $table->unsignedBigInteger("like")->nullable();
            $table->unsignedBigInteger("in_mark")->nullable();
            $table->integer("release_year")->nullable();
            $table->integer("episodes")->nullable();
            $table->json("comments")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mangas');
    }
}
