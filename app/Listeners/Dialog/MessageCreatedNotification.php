<?php

namespace App\Listeners\Dialog;

use App\Models\Dialog\Message;
use Illuminate\Support\Facades\Log;
use App\Events\Dialog\MessageCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageCreatedNotification implements ShouldQueue
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
     * @param  MessageCreated  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        /** @var Message $message */
        Message::create($event->message);

    }
}
