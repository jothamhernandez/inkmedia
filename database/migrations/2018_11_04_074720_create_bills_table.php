<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_name');
            $table->integer('vendor_id')->unsigned();
            $table->string('po_so')->nullable();
            $table->date('date_to_issued');
            $table->date('date_to_expire');
            $table->string('subheading')->nullable();
            $table->string('footer')->nullable();
            $table->string('memo')->nullable();
            $table->enum('status',['saved','expired','paid','canceled']);
            $table->text('items');

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('bills');
    }
}
