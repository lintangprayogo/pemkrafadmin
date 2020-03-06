<?php


namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    
     protected $fillable = [
        "exhibition_name","description","start_date","end_date","poster","price","location","longitude","latitude"
    ];
}
