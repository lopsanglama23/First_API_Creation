<?php

namespace App\Listeners;

use App\Events\UserRegisterd;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterd $event): void
    {
        Mail::to($event->user->email)->send(new WelcomeEmail());
    }

    public function failed(UserRegisterd $event, $exception): void
    {
        // Log the failure or take other actions
        \Log::error('Failed to send welcome email to: ' . $user->email, [
            'error' => $exception->getMessage()
        ]);
    }
}
