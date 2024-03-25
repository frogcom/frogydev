<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class playerPositions implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    public mixed $playerID;

    public $playerPosition;
    public function __construct( $playerPosition)
    {
        //
//        $this->playerID = $playerID;

        $this->playerPosition = $playerPosition;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new channel('player-position'),
        ];
    }
    public function broadcastAs()
    {
        return 'player';
    }

}
