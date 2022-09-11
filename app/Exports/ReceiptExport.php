<?php

namespace App\Exports;
use Illuminate\Http\Request;
use App\Models\Receipt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ReceiptExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Receipt No',
            'Patient Name',
            'Hospital Name',
            'Recipient Name',
            'Mobile No',
            'PRBC',
            'FFP',
            'RDP',
            'SDP',
            'Other',
            'Bag No',
            'Issue No',
            'Unit',
            'Payment Mode',
            'Blood Group',
            'Price',
            'Status',
            'Date of Receipt',
            'Time of Receipt',
        ];
    } 

    public function map($data): array
    {
        return [
            $data->receipt_no,
            $data->patient_name,
            $data->hospital_name,
            $data->recipient_name,
            $data->mobile_no,
            $data->PRBC,
            $data->FFP,
            $data->RDP,
            $data->SDP,
            $data->Other,
            $data->bag_no,
            $data->issue_no,
            $data->quntity_in_unity,
            $data->payment_mode,
            $data->blood_group,
            $data->price,
            $data->status,
            date('d-m-Y', strtotime($data->created_at)),
            date('H:i:s', strtotime($data->created_at)),
            
         ]; 
     }

    public function collection()
    {
       
        $startDate = request()->input('start_date');
        $endDate = request()->input('end_date');
       
        return Receipt::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();
    }
}
