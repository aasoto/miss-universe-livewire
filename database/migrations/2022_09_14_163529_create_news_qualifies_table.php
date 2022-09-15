<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_qualifies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('news_id');
            $table->integer('score')->unsigned();
            $table->integer('control')->unsigned();
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
        Schema::dropIfExists('news_qualifies');
    }
};
