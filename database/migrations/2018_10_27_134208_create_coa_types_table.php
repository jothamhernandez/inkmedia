<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coa_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coa_category')->unsigned();
            $table->string("type");
            $table->text("type_description")->nullable();
            $table->timestamps();

            $table->foreign('coa_category')->references('id')->on('coa_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coa_types');
    }
}
