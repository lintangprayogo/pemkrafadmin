<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CultureSite extends Model
{
    //
    protected $table="culturesites";
      protected $fillable = [
      	"register_date",
      	"register_number",
        "object_name",
        "object_category",
        "object_address",
        "object_exist",
        "kelurahan",
        "kecamatan",
        "kabupaten",
        "provinsi",
        "latitude",
        "cordinate",
        "longitude",
        "photo",
        "thumbmail"
    ];
}
