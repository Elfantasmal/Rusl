<?php

namespace App\Listeners;

use App\Events\StockAlert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendStockLowerAlertNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StockAlert  $event
     * @return void
     */
    public function handle(StockAlert $event)
    {
        //
    }
}
