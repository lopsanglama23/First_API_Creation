<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:50',
            'breed'       => 'required|string|max:50',
            'age'         => 'required|integer|min:0',
            'gender'      => 'required|in:Male,Female',
            'size'        => 'required|in:Small,Medium,Large,Extra Large',
            'temperament' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path'  => 'nullable|string|max:255',
            'created_by'  => 'nullable|integer|exists:users,id',
            'status'      => 'required|in:Available,Unavailable',
        ]);

        $dog = Dog::create($validated);

        return response()->json([
            'message' => 'Dog added successfully',
            'dog' => $dog
        ], 201);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'        => 'required|string|max:50',
            'breed'       => 'required|string|max:50',
            'age'         => 'required|integer|min:0',
            'gender'      => 'required|in:Male,Female',
            'size'        => 'required|in:Small,Medium,Large,Extra Large',
            'temperament' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path'  => 'nullable|string|max:255',
            'created_by'  => 'nullable|integer|exists:users,id',
            'status'      => 'required|in:Available,Unavailable',
        ]);
        $dog = Dog::find($id);
        $dog->update($validated);

        return response()->json([
            'message' => 'Dog Updated Successfully',
            'dog' => $dog,
        ]);
        
    }
    public function delete($id){
        $dog = Dog::find($id);
        $dog->delete();
        
        return response()->json([
            'message' => 'Dog Deleted Successfully'
        ]);
    }   
    /*public function search($id)
    {
        $dog = Dog::where('id',$id)->first();
        if(!$dog){
            return response()->json([
                'message' => 'Dog not found'
            ]);           
        }
        return response()->json($dog);
    }*/
    
    public function search($name){
        $dog = Dog::where('name', 'like', '%' . $name . '%')->get();

        if($dog->isempty()){
            return response()->json([
                'message' => 'Dog not found'
            ]); 
        }
         return response()->json($dog);
    }

    public function see($term)
    {
        $dogs = Dog::where('name', 'like', '%' . $term . '%')
                    ->orWhere('breed', 'like', '%' . $term . '%')
                    ->get();
        if ($dogs->isEmpty()) {
            return response()->json([
                'message' => 'No dogs found'
            ]);
        }
        return response()->json($dogs);
    }
   
}

