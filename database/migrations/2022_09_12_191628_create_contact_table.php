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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId("country_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("type_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('company_name', 300)->nullable();
            $table->string('person_name', 300)->nullable();
            $table->string('address', 300)->nullable();
            $table->string('email', 300)->nullable();
            $table->string('phone', 300)->nullable();
            $table->string('detail', 1000)->nullable();
            $table->enum('agree', ['yes', 'not'])->nullable();
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
        Schema::dropIfExists('contact');
    }
};
