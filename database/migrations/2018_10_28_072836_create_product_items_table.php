<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price',10,2);
            $table->boolean('isSellable')->default(false);
            $table->boolean('isBuyable')->default(false);
            $table->integer('income_account')->unsigned()->nullable();
            $table->integer('expense_account')->unsigned()->nullable();
            $table->double('sales_tax',10,2)->nullable();
            $table->timestamps();

            $table->foreign('income_account')->references('id')->on('coas');
            $table->foreign('expense_account')->references('id')->on('coas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_itmes');
    }
}
