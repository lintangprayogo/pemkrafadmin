<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Model\Destination;
use App\Model\DestinationCategory;
class DestinationImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        $count=0;
          foreach ($collection as $row) 
        {
          if($count>1){
            try{
            $categoryId = DestinationCategory::where("name",$row[1])->pluck("id")->first();
            $destination=Destination::Create([
            'destination_name'     => $row[0],
            'destination_category_id'    => $categoryId,
            'address' => $row[2],
            'kelurahan'    => $row[3],
            'kecamatan'  => $row[4],
            'provinsi'=>$row[5]
            ]);

          
            } catch(\Exception $e){
                  
            } 
          }
          $count++;
        }
    }
}

