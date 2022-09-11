<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'father_name',
        'email',
        'dob',
        'gender',
        'age',
        'mobile_no',
        'address',
        'weight',
        'blood_group',
        'hb',
    ];


    public $timestamps = true;

    public function donor_history(){
        return $this->hasMany('App\Models\DonorHistory','donor_id','id');
     }

    
}
