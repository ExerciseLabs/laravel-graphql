<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductImagesTable
 */
class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_images', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image');
                $table->integer('product_id')->unsigned();
                $table->timestamps();
            }
        );

        Schema::table(
            'product_images', function ($table) {
                $table
                    ->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
