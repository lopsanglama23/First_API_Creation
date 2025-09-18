<?php

namespace App\Http\Controllers;
use App\Models\application;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function userApplications($userId)
    {
        $applications = Application::with('dog')->where('user_id', $userId)->get();
        return response()->json($applications);
    }

    public function updatestatus(Request $request, $application_id){
        $Validated = $request->validate([
            'status' => 'nullable|in:Pending,Approved,Rejected'
        ]);
     
        $apply = Application::find($application_id);
        if(!$apply){
            return response()->json([
                'message'=> 'Application not found'
            ]);
        }
        $apply->status = $Validated['status'];
        $apply->save();
        return response()->json([
            'message' => 'Application status updated successfully',
            'application' => $apply
        ]);
    }
}