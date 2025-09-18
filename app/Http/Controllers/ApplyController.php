<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use App\Models\application;
use Illuminate\Http\Request;

class ApplyController extends BaseController
{
    public function apply(ApplyRequest $request)
    {
        $validated = $request->validated();
        $apply = Application::create($validated);
        return $this->sendresponse('application for dog', $apply);
    }
    /*public function userApplications($userId)
    {
        $applications = Application::with('dog')->where('user_id', $userId)->get();
        return response()->json($applications);
    }*/
    
}
