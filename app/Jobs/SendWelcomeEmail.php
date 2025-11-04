<?php
namespace App\Jobs;

use App\Mail\sendmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

use App\Models\User;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    { 
        //Sent the raw message to registered and validated email..
        // Mail::raw("Welcome {$this->user->name}", function($message){
        //     $message->to($this->user->email)
        //             ->subject("Welcome Email");
        // });
        // Store  message in cache for 10 mins
        //Cache::put('welcome_message_'.$this->user->id, 'Welcome '.$this->user->name, 600);

        Mail::to($this->user->email)->send(new sendmail($this->user));
    }
}
