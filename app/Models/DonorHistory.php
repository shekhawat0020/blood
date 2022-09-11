<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonorHistory extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="donor_history";
    protected $fillable = [
        'donor_id',
        'unit',
        'hb',
        'blood_group'
    ];


    public $timestamps = true;

    public function donor(){
        return $this->hasOne('App\Models\Donor','id','donor_id');
     }
}
