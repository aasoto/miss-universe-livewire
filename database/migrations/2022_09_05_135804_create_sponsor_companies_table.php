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
        Schema::create('sponsor_companies', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 500);
            $table->string('identification', 100)->nullable();
            $table->string('email', 150);
            $table->string('web_site', 100)->nullable();
            $table->text('extra_information')->nullable();
            $table->foreignId("sponsor_general_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['swimsuit', 'evening gown', 'accesories', 'makeup', 'skin care', 'other']);
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
        Schema::dropIfExists('sponsor_companies');
    }
};
