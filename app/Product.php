<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
       protected $fillable = [
        'umkm_id', 'name', 'price','photo','stock'
    ];

}
