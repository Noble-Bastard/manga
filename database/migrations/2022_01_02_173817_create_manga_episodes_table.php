<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangaEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga_episodes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("manga_id");
            $table->string("episode_name")->nullable();
            $table->boolean("open_source");
            $table->date("to_open_source")->nullable(); // if open_source == false -> set date, when episode being free(open source)
            $table->unsignedBigInteger("likes")->nullable();
            $table->json("pages"); // urls to photos
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
        Schema::dropIfExists('manga_episodes');
    }
}
