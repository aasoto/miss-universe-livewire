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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text('background')->nullable();
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->string('subtitle', 500)->nullable();
            $table->text('content');
            $table->date('date_publish')->nullable();
            $table->enum('posted', ['yes', 'not'])->nullable();
            $table->foreignId("category_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['article', 'news'])->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('news');
    }
};
