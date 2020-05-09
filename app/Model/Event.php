<?php


namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
     protected $fillable = [
        "event_name","description","start_date","end_date","poster","price","location","longitude","latitude","event_category_id"
    ];
}
