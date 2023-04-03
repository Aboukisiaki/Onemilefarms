<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('supplier_name');
            $table->string('qty');
            $table->string('current_stock')->nullable();
            $table->string('carcass_qty')->nullable();
            $table->string('product_coat')->nullable();
            $table->string('added_stock')->nullable();
            $table->string('out_stocked')->nullable();
            $table->string('category')->nullable();
            $table->string('date');
            $table->string('product_cost')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('materials');
    }
}
