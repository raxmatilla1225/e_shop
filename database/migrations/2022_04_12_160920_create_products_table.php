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
            $table->tinyText('short_desc_uz')->nullable();
            $table->tinyText('short_desc_en')->nullable();
            $table->tinyText('desc_en')->nullable();
            $table->tinyText('desc_ru')->nullable();
            $table->tinyText('desc_uz')->nullable();
            $table->float('price')->nullable();
            $table->float('old_price')->nullable();
            $table->float('discount')->nullable();
            $table->unsignedInteger('status_id')->nullable()->default(true);
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->string('slug')->nullable();
            $table->string('main_img');
            $table->json('images')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('quantity')->default(0);
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
