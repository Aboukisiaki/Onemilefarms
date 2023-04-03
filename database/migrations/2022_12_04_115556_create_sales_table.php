<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('name');
            $table->string('quantity');
            $table->string('price');
            $table->string('today');
            $table->string('monthly');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('customer_id')
            ->references('id')->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            // $table->foreign('sale_id')
            // ->references('id')->on('invoices')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
