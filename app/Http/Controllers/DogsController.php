<?php

namespace App\Http\Controllers;
use App\Http\Requests\DogRequest;
use App\Models\Dog;

class DogsController extends BaseController
{
    /*public function sendSuccessResponse($message, $data, $code=200)
    {
        return response()->json(["message" => $message, "data" => $data], $code);
    }*/

    public function store(DogRequest $request)
    {
        $validated = $request->validated();
        $dog = Dog::create($validated);
        return $this->sendResponse("Dog added", $dog);
    }

    public function update(DogRequest $request, $id)
    {
        $validated = $request->validated();
        $dog = Dog::find($id);
        if (!$dog) {
            return response()->json(["message" => "Dog not found"], 404);
        }
        $dog->update($validated);
        return $this->sendResponse("Dog updated", $dog);
    }

    public function delete($id)
    {
        $dog = Dog::find($id);
        if (!$dog) {
            return response()->json(["message" => "Dog not found"], 404);
        }
        $dog->delete();
        return response()->json(["message" => "Dog deleted successfully"]);
    }

    public function search($name)
    {
        $dogs = Dog::where('name', 'like', '%' . $name . '%')->get();
        if ($dogs->isEmpty()) {
            return response()->json(["message" => "Dog not found"]);
        }
        return response()->json($dogs);
    }

    public function see($term)
    {
        $dogs = Dog::where('name', 'like', '%' . $term . '%')
            ->orWhere('breed', 'like', '%' . $term . '%')
            ->get();
        if ($dogs->isEmpty()) {
            return response()->json(["message" => "No dogs found"]);
        }
        return response()->json($dogs);
    }
}
