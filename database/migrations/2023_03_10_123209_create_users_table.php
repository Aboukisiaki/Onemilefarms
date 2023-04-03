<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('title')->nullable();
            $table->string('phone_no')->nullable();
            $table->integer('dashboard')->nullable();
            $table->integer('adding_items')->nullable();
            $table->integer('Processed_stock')->nullable();
            $table->integer('items')->nullable();
            $table->integer('incoming_stock')->nullable();
            $table->integer('operations')->nullable();
            $table->integer('add_category')->nullable();
            $table->integer('invoices')->nullable();
            $table->integer('meat_category')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('customers')->nullable();
            $table->integer('users')->nullable();
            $table->integer('suppliers')->nullable();
            $table->integer('inventory')->nullable();
            $table->integer('overview')->nullable();


            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

