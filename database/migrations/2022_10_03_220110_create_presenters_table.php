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
        Schema::create('presenters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->foreignId("broadcaster_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('rol', ['main_show', 'backstage', 'prelims', 'national_costume', 'other']);
            $table->foreignId("country_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('presenters');
    }
};
