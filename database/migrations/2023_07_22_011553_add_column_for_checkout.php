<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnForCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('transaction_code')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('totalqty_item')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('state')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('packaging_tax')->nullable();
            $table->integer('payment_state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //
        });
    }
}
