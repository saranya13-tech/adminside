<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('cover')->nullable();
            $table->integer('quantity');
            $table->decimal('price');
            $table->integer('category');
            $table->integer('featured')->default(0);
            $table->decimal('sale_price');
            $table->integer('status')->default(0);
            $table->integer('latest')->default(0);
            $table->integer('coming')->default(0);
            $table->integer('popular')->default(0);
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
}
