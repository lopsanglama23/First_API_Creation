<?php

namespace App\Http\Controllers;
use App\Exports\DogExport;
use App\Http\Requests\DogRequest;
use App\Http\Resources\DogResourse;
use App\Models\Dog;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class DogController extends BaseController
{
    /*public function sendSuccessResponse($message, $data, $code=200)
    {
        return response()->json(["message" => $message, "data" => $data], $code);
    }*/

    public function store(DogRequest $request)
    {
        try {
            // <-----Database Transaction in CURD API (CREATE)------>
            DB::beginTransaction();
            $validated = $request->validated();

            if($request->hasFile('image_path')){
                $validated['image_path'] = $request->file('image_path')->store('dogs', 'public');
            }
            
            $dog = Dog::create($validated);
            DB::commit();
            return $this->sendResponse("Dog added successfully", DogResourse::make($dog));
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Dog creation failed: ' . $ex->getMessage());
            return $this->sendResponse('Failed to add dog: ' . $ex->getMessage(), null, 500);
        }
    }
    public function update(DogRequest $request, $id)
    {
        try {
            // <-----Database Transaction in CURD API (UPDATE)------>
            DB::beginTransaction();
            $validated = $request->validated();
            $dog = Dog::find($id);

            if (!$dog) {
                DB::rollBack();
                return $this->sendResponse("Dog not found", null, 404);
            }

            $dog->update($validated);
            DB::commit();

            return $this->sendResponse("Dog updated successfully", DogResourse::make($dog));

        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Dog update failed: ' . $ex->getMessage());
            return $this->sendResponse('Failed to update dog: ' . $ex->getMessage(), null, 500);
        }
    }

    public function delete($id)
    {
        try {
            // <-----Database Transaction in CURD API (DELETE)------>
            DB::beginTransaction();
            $dog = Dog::find($id);

            if (!$dog) {
                DB::rollBack();
                return $this->sendResponse("Dog not found", null, 404);
            }
            $hasPendingApplications = $dog->applications()
                ->where('status', 'Pending')
                ->exists();

            if ($hasPendingApplications) {
                DB::rollBack();
                return $this->sendResponse("Cannot delete dog with pending applications", null, 400);
            }

            $dog->delete();
            DB::commit();

            return $this->sendResponse("Dog deleted successfully");

        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Dog deletion failed: ' . $ex->getMessage());
            return $this->sendResponse('Failed to delete dog: ' . $ex->getMessage(), null, 500);
            
        }
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


    // public function dogExport($id){
    //     return Excel::download(new DogExport($id),'dog_'.$id.'dogs.xlsx');
    // }

    public function dogsExport()
    {
        return Excel::download(new DogExport, 'dogs.xlsx');
    }
}
//     public function seeItemNames(){

//     }
//     <?php

// namespace App\Http\Controllers;

// use App\Http\Requests\DogRequest;
// use App\Http\Resources\DogResourse;
// use App\Models\Dog;
// use Exception;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

// class DogController extends BaseController
// {
//     public function update(DogRequest $request, $id)
//     {
//         try {
//             DB::beginTransaction();
            
//             $validated = $request->validated();
//             $dog = Dog::find($id);
            
//             if (!$dog) {
//                 return response()->json(["message" => "Dog not found"], 404);
//             }
            
//             $dog->update($validated);
//             DB::commit();
            
//             return $this->sendResponse("Dog updated", DogResourse::make($dog));
            
//         } catch (Exception $ex) {
//             DB::rollBack();
//             Log::error('Dog update failed: ' . $ex->getMessage());
//             return $this->sendResponse('Failed to update dog: ' . $ex->getMessage(), null, 500);
//         }
//     }

    // public function delete($id)
    // {
    //     try {
    //         DB::beginTransaction();
            
    //         $dog = Dog::find($id);
            
    //         if (!$dog) {
    //             return response()->json(["message" => "Dog not found"], 404);
    //         }
            
    //         // Check if dog has pending applications
    //         $hasPendingApplications = $dog->applications()
    //             ->where('status', 'Pending')
    //             ->exists();
                
    //         if ($hasPendingApplications) {
    //             return response()->json([
    //                 "message" => "Cannot delete dog with pending applications"
    //             ], 400);
    //         }
            
    //         $dog->delete();
    //         DB::commit();
            
    //         return response()->json(["message" => "Dog deleted successfully"]);
            
    //     } catch (Exception $ex) {
    //         DB::rollBack();
    //         Log::error('Dog deletion failed: ' . $ex->getMessage());
    //         return response()->json([
    //             "message" => "Failed to delete dog: " . $ex->getMessage()
    //         ], 500);
    //     }
    // }

