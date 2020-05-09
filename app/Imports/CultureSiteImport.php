<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Model\CultureSite;
use App\Imports\CultureSiteImport;
class CultureSiteImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
         $count=0;
          foreach ($collection as $row) 
        {
          if($count>1){
            try{
            $site=CultureSite::Create([
        "register_date"=>$row[0],
      	"register_number"=>$row[1],
        "object_name"=>$row[2],
        "object_category"=>$row[3],
        "object_address"=>$row[5],
        "object_exist"=>$row[4],
        "kelurahan"=>$row[6],
        "kecamatan"=>$row[7],
        "kabupaten"=>$row[8],
        "provinsi"=>$row[9],
        "cordinate"=>$row[10],
        "height"=>$row[11]
            ]);

          
            } catch(\Exception $e){
                  
            } 
          }
          $count++;
        }
    }
}
