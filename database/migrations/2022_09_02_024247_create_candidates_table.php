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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("country_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string("first_name", 100);
            $table->string("second_name", 100)->nullable();
            $table->string("first_last_name", 100);
            $table->string("second_last_name", 100)->nullable();
            $table->string("gender", 10);
            $table->date("birthdate");
            $table->integer("age")->nullable();
            $table->foreignId("national_committee_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text("official_picture")->nullable();
            $table->text("pictures")->nullable();
            $table->text("videos")->nullable();
            $table->boolean('asigned')->default(false);
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
        Schema::dropIfExists('candidates');
    }
};
