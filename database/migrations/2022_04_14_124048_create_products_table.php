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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_uz');
            $table->tinyText('short_desc_ru')->nullable();
            $table->tinyText('short_desc_en')->nullable();
            $table->tinyText('short_desc_uz')->nullable();
            $table->tinyText('desc_ru')->nullable();
            $table->tinyText('desc_en')->nullable();
            $table->tinyText('desc_uz')->nullable();
            $table->float('price')->nullable();
            $table->float('old_price')->nullable();
            $table->float('discount')->nullable();
//            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->unsignedInteger('order')->nullable();
            $table->string('slug')->nullable();
            $table->string('main_img')->nullable();
            $table->json('images')->nullable();
//            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('delivery_days')->nullable();
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
        Schema::dropIfExists('products');
    }
};
