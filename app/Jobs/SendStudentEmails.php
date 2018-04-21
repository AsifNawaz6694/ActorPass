<?php


namespace App\Jobs;
ini_set('max_execution_time', 300);
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\studentEmail;
use Mail;
use App\User;

class SendStudentEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $usersz;
    protected $link;


    public function __construct($users, $link)
    { 
        $this->link = $link;        
        $this->usersz = $users;
  
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  
        foreach($this->usersz as $user){
            $student_email = new studentEmail($user, $this->link);
            $status = Mail::to($user['email'])->queue($student_email);
        }
    }
}
