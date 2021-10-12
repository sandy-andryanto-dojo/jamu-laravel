<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';  
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';  
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code');
            $table->string('name');
            $table->double('price', 19, 2)->default(0);
            $table->date('expired')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('photos')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';  
        });

        Schema::create('product_category', function (Blueprint $table) {
           $table->unsignedInteger('product_id');
           $table->unsignedInteger('category_id');
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           $table->engine = 'InnoDB';  
           $table->primary(['product_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brands');
    }
}
