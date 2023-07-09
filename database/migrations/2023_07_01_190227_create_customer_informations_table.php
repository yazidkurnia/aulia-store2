<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('phone');
            $table->text('alamat_lengkap');
            $table->string('kode_post');
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
        Schema::dropIfExists('customer_informations');
    }
}
