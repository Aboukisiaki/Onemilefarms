<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->string('Supplier_name');
            $table->string('product_name')->nullable();
            $table->string('phone_no')->nullable;
            $table->string('email')->nullable();
            $table->string('address')->nullable;
            $table->string('rank')->nullable;
            // $table->string('created_at')->nullable;
            // $table->string('updated_at')->nullable;
            // $table->string('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
