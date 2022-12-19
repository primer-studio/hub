<?php

namespace App\Listeners;

use App\Events\MessageReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewMessage
{
    public $backpack;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($backpack)
    {
        $this->backpack = $backpack;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageReceived  $event
     * @return void
     */
    public function handle(MessageReceived $event)
    {
        //
    }
}
