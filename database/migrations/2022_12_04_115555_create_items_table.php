<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('item_name')->nullable();;
            $table->string('item_code')->nullable();;
            $table->string('item_qty')->nullable();;
            $table->string('kg_mgr')->nullable();;
            $table->string('image')->nullable();;
            $table->string('path')->nullable();;
            $table->string('name')->nullable();;
            $table->string('Category')->nullable();;
            $table->string('sale_price')->nullable();;
            $table->string('product_cost')->nullable();;
            $table->string('profit')->nullable();;
            $table->string('date')->nullable();;



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
