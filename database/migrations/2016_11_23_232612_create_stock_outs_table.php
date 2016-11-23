<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->unsigned();
            $table->foreign('commodity_id')->references('id')->on('commodities');
            $table->integer('out_quantity')->unsigned();
            $table->enum('out_type',['销售出库','采购退货']);
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
        Schema::dropIfExists('stock_outs');
    }
}
