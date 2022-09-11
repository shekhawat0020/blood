<?php

use App\Models\Donor;
use App\Models\DonorHistory;
use App\Models\Receipt;


function getBloodStock($blood_group){
        $donate = DonorHistory::where('blood_group', $blood_group)->sum('unit');
        $receipts = Receipt::where('blood_group', $blood_group)
        ->where('status','Created')->sum('quntity_in_unity');
        return $donate-$receipts;
    }

    function getTotalStock(){
        $donate = DonorHistory::sum('unit');
        $receipts = Receipt::where('status','Created')->sum('quntity_in_unity');
        return $donate-$receipts;
    }