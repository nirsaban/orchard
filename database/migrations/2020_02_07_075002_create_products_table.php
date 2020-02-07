<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sku')->unique();
            $table->string('product_name');
            $table->string('type');
            $table->float('size');
            $table->string('color');
            $table->float('price');
            $table->float('labor');
            $table->float('unit', 20, 4);
            $table->bigInteger('stipulation');
            $table->float('discount_price');
            $table->string('shingle_type');
            $table->string('shape');
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
}
