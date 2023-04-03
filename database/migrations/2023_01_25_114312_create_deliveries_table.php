
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('sale_id');
            // $table->unsignedBigInteger('deliver_id');
            $table->date('delivery_date')->nullable();
            $table->string('descriptions')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')
            ->references('id')->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('sale_id')
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
        Schema::dropIfExists('deliveries');
    }
}
