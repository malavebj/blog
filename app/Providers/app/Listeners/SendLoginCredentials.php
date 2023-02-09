<?php

namespace App\Providers\app\Listeners;

use App\Providers\app\Events\UserWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoginCredentials
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
     * @param  \App\Providers\app\Events\UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        //
    }
}
