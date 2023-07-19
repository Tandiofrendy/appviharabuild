<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendActivationEmail
{
    
    public $user;
    public $tes;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Auth\\UserActivationEmail  $event
     * @return void
     */
    public function handle(UserActivationEmail $event)
    {

      
       if($event->user->isVerified ){
        return;
       }
    
       Mail::to($event->user->email)->send(new ActivationEmail($event->user));
    }
}
