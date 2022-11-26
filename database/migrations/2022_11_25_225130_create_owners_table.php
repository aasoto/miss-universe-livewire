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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 300);
            $table->text('logo_light_theme')->nullable();
            $table->text('logo_dark_theme')->nullable();
            $table->foreignId("country_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('description');
            $table->string('owner_name', 300)->nullable();
            $table->string('owner_occupation', 1000)->nullable();
            $table->text('owner_picture')->nullable();
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
        Schema::dropIfExists('owners');
    }
};
