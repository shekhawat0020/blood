<?php

namespace App\Exports;
use Illuminate\Http\Request;
use App\Models\DonorHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class DonorHistoryExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Donor Name',
            'Father Name',
            'Email',
            'DOB',
            'AGE',
            'Gender',
            'Mobile No',
            'Occupation',
            'Address',
            'Weight',
            'blood_group',
            'HB',
            'Unit',
            'Date of Registration',
            'Date of Donation',
            'Time of Donation',
        ];
    } 

    public function map($data): array
    {
        return [
            $data->donor->name,
            $data->donor->father_name,
            $data->donor->email,
            $data->donor->dob,
            $data->donor->age,
            $data->donor->gender,
            $data->donor->mobile_no,
            $data->donor->occupation,
            $data->donor->address,
            $data->donor->weight,
            $data->blood_group,
            $data->hb,
            "1",
            $data->donor->created_at,
            date('d-m-Y', strtotime($data->created_at)),
            date('H:i:s', strtotime($data->created_at)),
            
         ]; 
     }

    public function collection()
    {
       
        $startDate = request()->input('start_date');
        $endDate = request()->input('end_date');
       
        return DonorHistory::with('donor')
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();
    }
}
