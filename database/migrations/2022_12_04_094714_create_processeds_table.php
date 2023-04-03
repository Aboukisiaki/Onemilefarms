<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processeds', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();;
            $table->string('item_code')->nullable();;
            $table->string('expire_date')->nullable();
            $table->string('date')->nullable();
            $table->string('current_stock')->nullable();;
            $table->string('item_image');
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
        Schema::dropIfExists('processeds');
    }
}
