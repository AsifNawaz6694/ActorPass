<?php

namespace App\Listeners;


use App\Profile;
use App\Events\UserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserProfile
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
     * @param  User  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        $profile = Profile::create([
            'user_id' => $event->user->id,
        ]); 
    }
}
