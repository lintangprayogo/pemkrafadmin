<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    //
    protected $table = 'umkm';
   protected $fillable = [
           "logo","longitude","latitude","phone",
            'umkm_name',
            'owner',
            'umkm_permission_name',
            'umkm_permission_number',
            'npwp',
            'year',
            'address',
            'rt',
            'rw',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'postal_code',
            'phone',
            'fax',
            'email',
            'website',
            'business_form',
            'business_sector',
            'data_year',
            'male_employe',
            'female_employe',
            'male_labor',
            'female_labor',
            'capacity',
            'turnover',
            'asset',
            'independent_capital',
            'external_capital',
            'data_resource'
    ];

}
