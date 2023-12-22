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
            $table->string('product_name');
            $table->string('short_description');
            $table->text('description');
            $table->integer('price');
            $table->string('product_category_name');
            $table->string('product_sub_category_name');
            $table->integer('product_category_id');
            $table->integer('product_sub_category_id');
            $table->integer('quantity');
            $table->string('product_image');
            $table->string('slug');
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
