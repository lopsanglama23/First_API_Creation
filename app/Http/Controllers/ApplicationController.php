<?php

namespace App\Http\Controllers;
use App\Http\Resources\ApplicationResource;
use App\Models\application;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ApplicationController extends ResponseController
{
    public function userApplications($userId)
    {
        $applications = Application::with('dog')->where('user_id', $userId)->get();
        //return response()->json($applications);
        return $this->responseSend("Aplications for dog." ,$applications);
        //return response()->json(ApplicationResource::make($applications));
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
        /*return response()->json([
            'message' => 'Application status updated successfully',
            'application' => $apply
        ]);*/
        return $this->responseSend('Application status Updated Succesfully', $apply);
        
    }

    public function applicants($dog_id){
        $application = Application::find($dog_id);
         return response()->json([
            "message" => "!The Applications for dogs by Adopters!",
            "data" =>$application
         ]);

    }
     
}