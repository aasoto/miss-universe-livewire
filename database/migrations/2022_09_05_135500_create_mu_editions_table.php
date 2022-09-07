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
        Schema::create('mu_editions', function (Blueprint $table) {
            $table->id();
            $table->string('edition', 10);
            $table->string('official_name', 500);
            $table->foreignId("country_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('city_venue', 200)->nullable();
            $table->integer('num_contestants')->nullable();
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
        Schema::dropIfExists('mu_editions');
    }
};
