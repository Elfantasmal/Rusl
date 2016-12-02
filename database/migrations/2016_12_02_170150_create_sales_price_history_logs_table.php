<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPriceHistoryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_price_history_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->unsigned();
            $table->foreign('commodity_id')->references('id')->on('commodities');
            $table->integer('sales_price')->unsigned();
            $table->date('changed_at');
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
        Schema::drop('sales_price_history_logs');
    }
}
