<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_name',
        'receipt_no',
        'hospital_name ',
        'recipient_name',
        'mobile_no',
        'PRBC',
        'FFP',
        'RDP',
        'SDP',
        'Other',
        'bag_no',
        'issue_no',
        'quntity_in_unity',
        'payment_mode',
        'blood_group',
        'price',
    ];


    public $timestamps = true;

    
}
