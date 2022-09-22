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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->boolean('visible')->default(true);
            $table->string("type", 50);
            $table->string("image", 1000);
            $table->string("title", 500)->nullable();
            $table->string("subtitle", 700)->nullable();
            $table->string("secondary_image", 1000)->nullable();
            $table->string("button_1_text", 50)->nullable();
            $table->enum('button_1_type', [
                'default',
                'pills',
                'gradient monochrome',
                'gradient duotone',
                'gradient outline',
                'colored shadows',
                'social button',
                'payment button'
            ])->nullable();
            $table->string("button_1_color", 2000)->nullable();
            $table->string("button_1_link", 2000)->nullable();
            $table->string("button_2_text", 50)->nullable();
            $table->enum('button_2_type', [
                'default',
                'pills',
                'gradient monochrome',
                'gradient duotone',
                'gradient outline',
                'colored shadows',
                'social button',
                'payment button'
            ])->nullable();
            $table->string("button_2_color", 2000)->nullable();
            $table->string("button_2_link", 2000)->nullable();
            $table->boolean('selected')->default(false);
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
        Schema::dropIfExists('carousels');
    }
};
