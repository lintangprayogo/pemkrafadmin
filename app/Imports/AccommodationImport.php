<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Model\Accommodation;
use App\Model\AccommodationCategory ;
class AccommodationImport implements ToCollection
{
    public function collection(Collection $collection)
    {
         $count=0;
         $categories=AccommodationCategory::get();


        foreach ($collection as $row) 
        {

          if($count>1){
          	$category_id;
            $photo;
          	if($row[2]==1){
               $category_id=$categories[0]->id;
               $photo="hotel.jpg";
          	}else {
               $category_id=$categories[1]->id;
               $photo="villa.jpg";
          	}
          	$kecamatan ="";
            if($row[5]==1){
              $kecamatan="Baleendah";
            }else if($row[5]==2){
              $kecamatan="Bojongsoang";
            }else if($row[5]==3){
              $kecamatan="Cicalengka";
            }else if($row[5]==4){
              $kecamatan="Cileunyi";
            }else if($row[5]==5){
              $kecamatan="Margaasih";
            }else if($row[5]==6){
              $kecamatan="Soreang";
            }else if($row[5]==7){
              $kecamatan="Lembang";
            }else if($row[5]==8){
              $kecamatan="Parongpong";
            }else if($row[5]==9){
              $kecamatan="Cikole";
            }else if($row[5]==10){
              $kecamatan="Sukasari";
            }else if($row[5]==11){
              $kecamatan="Sagalaherang";
            }
            try{
             $site=Accommodation::Create([
            "accommodation_name"=>$row[0],
            "star"=>$row[1],
            "accommodation_category_id"=>$category_id,
            "location"=>$row[3],
            "kelurahan"=>$row[4],
            "kecamatan"=>$kecamatan,
            "provinsi"=>$row[6],
            "cordinate"=>$row[7],
            "photo"=>$photo
            ]);

          
            } catch(\Exception $e){
                  
            } 
          }
          $count++;
        }
    }
}
