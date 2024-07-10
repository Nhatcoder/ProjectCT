<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('sku')->unique(); // SKU là mã sản phẩm
            $table->decimal('price', 10, 2);
            $table->date('expiry_date');
            $table->unsignedBigInteger('category_id');
            $table->integer('quantity');
            $table->text('description');
            $table->string('short_description');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
