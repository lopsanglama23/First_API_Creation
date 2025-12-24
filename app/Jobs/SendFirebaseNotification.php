<?php

namespace App\Jobs;

use App\Services\FirebaseNotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendFirebaseNotification implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public string $token;
    public string $title;
    public string $body;
    public array $data;

    public function __construct(
        string $token,
        string $title,
        string $body,
        array $data = []
    ) {
        $this->token = $token;
        $this->title = $title;
        $this->body  = $body;
        $this->data  = $data;
    }

    public function handle(FirebaseNotificationService $firebase): void
    {
        if (!$this->token) {
            return;
        }

        $firebase->send(
            $this->token,
            $this->title,
            $this->body,
            $this->data
        );
    }
}
