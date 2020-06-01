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
             $photo;
            if($row[1]=="Situ"){
               $photo="danau.png";
            }else if($row[1]=="Air Terjun"){
               $photo="airterjun.png";
            }else if($row[1]=="Gua"){
               $photo="gua.png";
            }else if($row[1]==" Wisata"){
               $photo="wisata.png";
            }else if($row[1]=="Kolam Wisata"){
               $photo="kolam.png";
            }else if($row[1]=="Gua"){
               $photo="gua.png";
            }else if($row[1]=="Wisata Kuda"){
               $photo="kuda.png";
            }else if($row[1]=="Resto & Outbond"){
               $photo="outbond.png";
            }else if($row[1]=="Resto & Villa"){
               $photo="villa.png";
            }else if($row[1]=="Wisata Edukasi & Ilmiah"){
               $photo="edukasi.png";
            }else if($row[1]=="Wisata Bunga"){
               $photo="bunga.png";
            }else if($row[1]=="Wisata Alam"){
               $photo="alam.png";
            }else if($row[1]=="Outbond"){
               $photo="outbond.png";
            }
          
          
            $destination=Destination::Create([
            'destination_name'     => $row[0],
            'destination_category_id'    => $categoryId,
            'address' => $row[2],
            'kelurahan'    => $row[3],
            'kecamatan'  => $row[4],
            'provinsi'=>$row[5],
            "photo"=>$photo
            ]);

          
            } catch(\Exception $e){
                  
            } 
          }
          $count++;
        }
    }
}

