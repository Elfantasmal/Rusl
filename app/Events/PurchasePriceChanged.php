<?php

namespace App\Events;

use App\Models\Commodity;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PurchasePriceChanged
{
    use InteractsWithSockets, SerializesModels;

    public $commodity;

    /**
     * Create a new event instance.
     *
     * @param Commodity $commodity
     * @return void
     */
    public function __construct(Commodity $commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
