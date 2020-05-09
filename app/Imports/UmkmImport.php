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
            
            $business_form="";
            if($row[19]==3){
             $business_form="PP/CV/PT/Yayasan";
            }else if($row[19]==7){
             $business_form="Izin Usaha Lokal/IPRT/Suket/Domicili";
            }else if($row[19]==6){
                $business_form="Komunitas";
            }else if($row[19]==4){
                $business_form="PD";
            }
            $kecamatan ="";
            if($row[11]==1){
              $kecamatan="Baleendah";
            }else if($row[11]==2){
              $kecamatan="Bojongsoang";
            }else if($row[11]==3){
              $kecamatan="Bojongsoang";
            }else if($row[11]==4){
              $kecamatan="Cicalengka";
            }else if($row[11]==5){
              $kecamatan="Cileunyi";
            }else if($row[11]==6){
              $kecamatan="Soreang";
            }

            $business_sector ="";
            if($row[20]==3){
                 $business_sector="Industri Pengolahan";
                 $logo="industri.png";
            }
            else if($row[20]==9){
                 $business_sector="Penyedia Akomodasi, Makanan, dan Minuman";
                 $logo="food.png";
            }
            else if($row[20]==6){
                 $business_sector="Konstruksi";
                 $logo="kontruksi.png";
            } else if($row[20]==1){
                 $business_sector="Pertanian,Kehutanan,Perikanan";
                 $logo="farming.png";
            }else if ($row[20]==7) {
                $business_sector="Pelindung Diri Jaket";
                $logo="jacket.png";
            }else if ($row[20]==16) {
                $business_sector="Lukisan Seni,Swadaya Masyarakat,Lain-Lain";
                $logo="masyarakat.png";
            }else if ($row[20]==13) {
                $business_sector="Kemasan,Packaging,Finishing produk";
                $logo="deliverybox.png";
            }else if ($row[20]==5) {
                $business_sector="Daur Ulang,Recycle Produk";
                $logo="recyle.png";
            }


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
            'kelurahan'=>null,
            'kecamatan'=>$kecamatan,
            'kabupaten'=>"Bandung",
            'provinsi'=>$row[13],
            'postal_code'=>$row[14],
            'phone'=>$row[15],
            'fax'=>$row[16],
            'email'=>$row[17],
            'website'=>$row[18],
            'business_form'=>$business_form,
            'business_sector'=>$business_sector,
            'data_year'=>$row[21],
            'male_employe'=>$row[22],
            'female_employe'=>$row[23],
            'male_labour'=>$row[24],
            'female_labour'=>$row[25],
            'capacity'=>$row[26],
            'omset'=> ((int)str_replace(",","",$row[27])),
            'asset'=>$row[28],
            'independent_capital'=>((int)str_replace(",","",$row[29])),
            'external_capital'=>((int)str_replace(",","",$row[30])),
            'data_resource'=>$row[31],
            "regional_market"=>$row[32],
            "national_market"=>$row[33],
            "inter_market"=>$row[34],
            "logo"=>$logo
            ]);

            $user->assignRole("guest");



            } catch(\Exception $e){
                  
            }


           
          }
          $count++;
        }
    }
}
