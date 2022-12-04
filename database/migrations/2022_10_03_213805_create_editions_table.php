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
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->string('year', 20);
            $table->string('name', 200);
            $table->string('official_name', 1000)->nullable();
            $table->date('start_concentration')->nullable();
            $table->date('end_concentration')->nullable();
            $table->string('hotel_concentration', 200)->nullable();
            $table->date('date_preliminary')->nullable();
            $table->date('date')->nullable();
            $table->foreignId("owner_id")->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId("broadcaster_id")->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('broadcaster_2')->nullable();
            $table->foreignId("place_id")->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('entrants')->nullable();
            $table->integer('placements')->nullable();
            $table->text('description');
            $table->text('content')->nullable();
            $table->boolean('top_3')->default(false);
            $table->boolean('top_5')->default(false);
            $table->boolean('top_6')->default(false);
            $table->text('extra_data')->nullable();
            $table->text('logo')->nullable();
            $table->text('background')->nullable();
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
        Schema::dropIfExists('editions');
    }
};
