<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function apply(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'dog_id' => 'required|integer|exists:dogs,dog_id',
            'application_date' => 'required|date',
            'status' => 'nullable|in:Pending,Approved,Rejected',
            'notes' => 'nullable|string',
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'housing_type' => 'required|in:House,Apartment,Condo',
            'has_yard' => 'required|in:Yes,No',
            'has_children' => 'required|in:Yes,No',
            'has_other_pets' => 'required|in:Yes,No',
            'work_schedule' => 'required|string',
            'previous_experience' => 'required|string',
            'adoption_reason' => 'required|string'
        ]);
        
        $apply = Application::create($validated);

        return response()->json([
            'message' => 'Application for slected dog is done',
            'application' => $application
        ], 201);
    }
}
