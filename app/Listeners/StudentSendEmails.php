<?php

namespace App\Listeners;

use App\Events\StudentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentSendEmails
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
     * @param  StudentEvent  $event
     * @return void
     */
    public function handle(StudentEvent $event)
    {
        //
    }
}
