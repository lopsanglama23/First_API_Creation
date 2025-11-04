<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $status;

     public function __construct($status) {
        $this->status = $status;
    }
    public function collection()
    {
        if($this->status){
            return Application::where('status',$this->status)
            ->select('user_id','application_id','application_date','full_name',
                     'status','notes','email','phone','address','housing_type')->get();   
        }

    }

    public function headings(): array{
        return ["USER_ID", "APPLICATION_ID", "APPLICATION_DATE", "FULL_NAME",
                "STATUS", "NOTES", "EMAIL","PHONE","ADDRESS","HOUSING_TYPE"
        ];
    }
}
