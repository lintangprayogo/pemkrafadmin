<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\user;
use Hash;
use Spatie\Permission\Models\Role;
class AdminImport implements ToCollection
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
            $user=User::Create([
            'name'     => $row[0],
            'email'    => $row[1],
            'phone'    => $row[2],
            'address'  => $row[3],
            'password' => Hash::make($row[4]),
            ]);

            $user->assignRole("guest");



            } catch(\Exception $e){
                  
            }


           
          }
          $count++;
        }
    }
}
