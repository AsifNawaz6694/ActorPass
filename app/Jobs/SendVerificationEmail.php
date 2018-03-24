<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EmailVerification;
use Mail;
use App\User;

class SendVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Generating and Saving random token to Users Table
        $token = str_random(30);
        $user = User::find($this->user->id);
        $user->email_token = $token;
        $email_token_update = $user->save();

        $email = new EmailVerification($this->user, $token);
        Mail::to($this->user->email)->send($email);
    }
}
