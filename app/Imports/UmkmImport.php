<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Model\Umkm;
class UmkmImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $count=0;
        foreach ($collection as $row) 
        {
          if($count!=0){
            try{
            $umkm=Umkm::Create([
            'umkm_name'=> $row[1],
            'owner'=> $row[2],
            'umkm_permission_name'=> $row[3],
            'umkm_permission_number'=> $row[4],
            'npwp'  => $row[5],
            'year' => $row[6],
            'address'=>$row[7],
            'rt'=>$row[8],
            'rw'=>$row[9],
            'kelurahan'=>$row[10],
            'kecamatan'=>$row[11],
            'kabupaten'=>$row[12],
            'provinsi'=>$row[13],
            'postal_code'=>$row[14],
            'phone'=>$row[15],
            'fax'=>$row[16],
            'email'=>$row[17],
            'website'=>$row[18],
            'business_form'=>$row[19],
            'business_sector'=>$row[20],
            'data_year'=>$row[21],
            'male_employe'=>$row[22],
            'female_employe'=>$row[23],
            'male_labor'=>$row[22],
            'female_labor'=>$row[23],
            'capacity'=>$row[24],
            'turnover'=>$row[25],
            'asset'=>$row[26],
            'independent_capital'=>$row[27],
            'external_capital'=>$row[28],
            'data_resource'=>$row[29]
            ]);

            $user->assignRole("guest");



            } catch(\Exception $e){
                  
            }


           
          }
          $count++;
        }
    }
}
