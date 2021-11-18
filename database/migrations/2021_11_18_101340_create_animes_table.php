<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name_english')->nullable();
            $table->string('name_japanese')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('studios')->nullable();
            $table->string('aired')->nullable();
            $table->string('status')->nullable();
            $table->string('country')->nullable();
            $table->string('scores')->nullable();
            $table->string('premiered')->nullable();
            $table->string('year')->nullable();
            $table->string('season')->nullable();
            $table->string('duration')->nullable();
            $table->string('episodes')->nullable();
            $table->string('quality')->nullable();
            $table->string('thumnail')->nullable();
            $table->string('link')->nullable();
            $table->integer('mal_id')->nullable();
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
        Schema::dropIfExists('animes');
    }
}
