<?php

namespace App\Http\Controllers;

use App\Jobs\SendFirebaseNotification;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FcmTestController extends Controller
{
    public function saveToken(Request $request)
    {
        $request->validate(['fcm_token' => 'required|string']);

        Auth::user()->update(['fcm_token' => $request->fcm_token]);

        return response()->json(['message' => 'FCM token saved successfully!']);
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $user = Auth::user();

        if (!$user->fcm_token) {
            return response()->json(['error' => 'No FCM token found for user'], 400);
        }

        // Dispatch the job to send notification
        SendFirebaseNotification::dispatch(
            $user->fcm_token,
            $request->title,
            $request->body,
            $request->data ?? []
        );

        return response()->json(['message' => 'Notification sent successfully!']);
    }
}
