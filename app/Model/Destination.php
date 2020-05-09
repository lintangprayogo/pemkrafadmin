<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
     protected $fillable = [
        "destination_name","address","RT","RW","kelurahan","kecamatan","kabupaten","provinsi","latitude","destination_category_id","photo","event_category_id"
    ];
   
}
