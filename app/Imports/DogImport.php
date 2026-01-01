<?php

namespace App\Imports;

use App\Models\Dog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DogImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            Dog::create([
                'name' => $row['name'],
                'breed'=>$row['breed'],
                'age'=>$row['age'],
                'gender'=>$row['gender'],
                'size'=>$row['size'],
                'temperament'=>$row['temperament'],
                'description'=>$row['description'],
                'image_path'=>$row['image_path'],
                'created_by'=>$row['created_by'],
                'status'=>$row['status'],
            ]);
        }
    }
}
