<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="app_config";
    protected $fillable = [
        'PRBC_price',
        'FFP_price',
        'RDP_price',
        'SDP_price',
        'Other_price',
    ];


    public $timestamps = true;

   
}
