<?php

namespace App\Exports;
use App\Models\Dog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DogExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //protected $id;
    // public function __construct($id) {
    //     $this->id = $id;
    // }
    public function collection()
    {
        // ensure we use the injected id and return a Collection
       // return Dog::where('dog_id', $this->id)->get();
    
        return Dog::all([
            'name',
            'breed',
            'age',
            'gender',
            'size',
            'temperament',
            'description',
            'image_path',
            'created_by',
            'status',
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'BREED',
            'AGE',
            'GENDER',
            'SIZE',
            'TEMPERAMENT',
            'DESCRIPTION',
            'IMAGE PATH',
            'CREATED BY',
            'STATUS',
        ];
    }
}
