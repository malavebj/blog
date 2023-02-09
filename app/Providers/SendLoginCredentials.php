<?php

namespace App\Providers;

use App\Providers\UserWasCreated;
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
     * @param  \App\Providers\UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        //
    }
}
