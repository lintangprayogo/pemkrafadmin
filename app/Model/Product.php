<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;

     protected $fillable = [
        "name","photo","price","umkm_id"
    ];
}
