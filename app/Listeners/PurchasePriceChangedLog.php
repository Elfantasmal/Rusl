<?php

namespace App\Listeners;

use App\Events\PurchasePriceChanged;
use App\Models\PurchasePriceHistoryLog;
use Jenssegers\Date\Date;

class PurchasePriceChangedLog
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
     * @param  PurchasePriceChanged $event
     * @return void
     */
    public function handle(PurchasePriceChanged $event)
    {
        PurchasePriceHistoryLog::create([
            'commodity_id' => $event->commodity->id,
            'purchase_price' => $event->commodity->purchase_price,
            'changed_at' => Date::now()->format('Y-m-d')
        ]);
    }
}
