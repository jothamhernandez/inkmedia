<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estimate_name');
            $table->integer('customer_id')->unsigned();
            $table->string('po_so')->nullable();
            $table->date('date_to_issued');
            $table->date('date_to_expire');
            $table->string('subheading')->nullable();
            $table->string('footer')->nullable();
            $table->string('memo')->nullable();
            $table->enum('status',['saved','expired','paid','canceled']);
            $table->text('items');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
