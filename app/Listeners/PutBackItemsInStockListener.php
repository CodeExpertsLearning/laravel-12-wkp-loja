<?php

namespace App\Listeners;

use App\Events\UserCancelledOrder;
use App\Services\StockManagerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PutBackItemsInStockListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCancelledOrder $event): void
    {
        (new StockManagerService($event->order))->addingProductInStock();
    }
}
