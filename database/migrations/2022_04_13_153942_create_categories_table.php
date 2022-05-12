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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_uz')->nullable();
            $table->string('slug', 512)->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_ru')->nullable();
            $table->string('description_uz')->nullable();
            $table->string('icon')->nullable();
            $table->string('image', 512)->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('categories');
    }
};
