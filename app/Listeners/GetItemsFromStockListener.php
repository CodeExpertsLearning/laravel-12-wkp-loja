<?php

namespace App\Listeners;

use App\Events\UserOrderedItemsEvent;
use App\Services\StockManagerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetItemsFromStockListener
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
    public function handle(UserOrderedItemsEvent $event): void
    {
        (new StockManagerService($event->order))->removeProductFromStock();
    }
}
