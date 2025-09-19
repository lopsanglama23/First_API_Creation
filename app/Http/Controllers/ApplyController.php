<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\application;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class ApplyController extends ResponseController
{
    public function apply(ApplyRequest $request)
    {
        $validated = $request->validated();
        $apply = Application::create($validated);
        //return $this->sendresponse('application for dog', $apply);
        return $this->responseSend('applicaation for dog', ApplicationResource::make($apply));
    }
    /*public function userApplications($userId)
    {
        $applications = Application::with('dog')->where('user_id', $userId)->get();
        return response()->json($applications);
    }*/
    
}
