<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTablePrductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productdetails', function (Blueprint $table) {
            $table->string('merk')->nullable()->after('category_id');
            $table->string('productname')->nullable()->after('merk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productdetails', function (Blueprint $table) {
            //
        });
    }
}
