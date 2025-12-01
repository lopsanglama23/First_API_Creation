<?php

namespace App\Http\Controllers;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApplicationController extends ResponseController
{
    public function userApplications($userId)
    {
        try{
            $applications = Application::with('dog')->where('user_id', $userId)->get();
            //return response()->json($applications);
            return $this->responseSend("Aplications for dog." ,$applications);
            //return response()->json(ApplicationResource::make($applications));
        } catch (Exception $ex) {
            return $this->responseSend('Failed to fetch applications', null);
        }
    }

    public function updatestatus(Request $request, $application_id){
        try{
            DB::beginTransaction();
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
            DB::commit();
            return $this->responseSend('Application status Updated Succesfully', $apply);
        }
        catch(Exception $ex){
            DB::rollBack();
            return $this->responseSend('Application Updated Failed', null);
        }
        
    }

    public function applicants($dog_id){
        $applications = Application::where('dog_id', $dog_id)->get();
         return response()->json([
            "message" => "!The Applications for dogs by Adopters!",
            "data" => $applications
         ]);
    }     
}