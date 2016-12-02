<?php

namespace App\Listeners;

use App\Events\SalesPriceChanged;
use App\Models\SalesPriceHistoryLog;
use Jenssegers\Date\Date;

class SalesPriceChangedLog
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
     * @param  SalesPriceChanged $event
     * @return void
     */
    public function handle(SalesPriceChanged $event)
    {
        SalesPriceHistoryLog::create([
            'commodity_id' => $event->commodity->id,
            'sales_price' => $event->commodity->sales_price,
            'changed_at' => Date::now()->format('Y-m-d')
        ]);
    }
}
