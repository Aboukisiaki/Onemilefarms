<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('sales_id');
            $table->unsignedBigInteger('product_id');
            $table->string('Customer_name')->nullable();
            $table->string('Customer_phone_no')->nullable();
            $table->string('Customer_email')->nullable();
            $table->string('Customer_address')->nullable();
            $table->string('rank')->nullable();
            $table->string('Company_name')->nullable();
            $table->string('Comphone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('product_id')
            ->references('id')->on('items')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('sales_id')
            ->references('id')->on('sales')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
