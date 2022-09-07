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
        Schema::create('sponsor_generals', function (Blueprint $table) {
            $table->id();
            $table->foreignId("mu_edition_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('own_objective', 500)->nullable()->default('unspecified');
            $table->text('message')->nullable()->default('unspecified');
            $table->enum('type', ['company', 'person']);
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
        Schema::dropIfExists('sponsor_generals');
    }
};
