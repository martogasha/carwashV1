<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carlists', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('number_plate');
            $table->string('phone')->nullable();
            $table->integer('charge_id')->nullable();
            $table->integer('washer_id');
            $table->integer('washerOne_id')->nullable();
            $table->integer('amount');
            $table->integer('rate');
            $table->integer('rate_one')->nullable();
            $table->integer('discountAmount');
            $table->integer('discountAmountOne')->nullable();
            $table->integer('totalDiscount');
            $table->integer('payment_method')->nullable();
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
        Schema::dropIfExists('carlists');
    }
}
