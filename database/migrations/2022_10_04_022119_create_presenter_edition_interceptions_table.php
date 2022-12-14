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
        Schema::create('presenter_edition_interceptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("presenter_id")->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId("edition_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('presenter_edition_interceptions');
    }
};
