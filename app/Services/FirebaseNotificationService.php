<?php

namespace App\Services;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseNotificationService
{
    public function send(string $token, string $title, string $body, array $data = []): bool
    {
        try {
            $messaging = Firebase::messaging();

            $notification = Notification::create($title, $body);

            $message = CloudMessage::withTarget('token', $token)
                ->withNotification($notification)
                ->withData($data);

            $messaging->send($message);

            return true;
        } catch (\Exception $e) {
            // Log the error
            \Log::error('FCM Notification failed: ' . $e->getMessage());
            return false;
        }
    }
}
