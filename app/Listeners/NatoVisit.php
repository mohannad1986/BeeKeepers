<?php

namespace App\Listeners;
use App\Events\Visit;
use App\User;

use App\Notifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NatoVisit
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
     * @param  object  $event
     * @return void
     */
    public function handle( Visit $event)
    {
        $this->visituser($event->user);
    }

    function visituser($user) {



        Notification::send($user,new \App\Notifications\VisitPage());


    }
}
