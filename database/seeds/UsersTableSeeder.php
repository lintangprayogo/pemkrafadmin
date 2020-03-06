<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$super=User::create(['name'=>"adminsuper",
                    'email'=>"adminsuper@gmail.com",
                     "address"=>"Jalan Flamboyan No 31",
                    "phone"=>"082216643372",
                    "password"=>Hash::make("12345678"),
                    "remember_token"=>str_random(10)
         ]);

        $ekraf=User::create(['name'=>"adminekraf",
                    'email'=>"adminekraf@gmail.com",
                     "address"=>"Jalan Flamboyan No 43",
                    "phone"=>"082216643372",
                    "password"=>Hash::make("12345678"),
                    "remember_token"=>str_random(10)
         ]);

        $pariwisata=User::create(['name'=>"adminpariwisata",
                    'email'=>"adminpariwisata@gmail.com",
                    "address"=>"Jalan Flamboyan No 90",
                    "phone"=>"082216643372",
                    "password"=>Hash::make("12345678"),
                    "remember_token"=>str_random(10)
         ]);

         $budaya=User::create(['name'=>"adminbudaya",
                    'email'=>"adminbudaya@gmail.com",
                    "address"=>"Jalan Flamboyan No 29",
                    "phone"=>"082216643372",
                    "password"=>Hash::make("12345678"),
                    "remember_token"=>str_random(10)
         ]);

         $super->assignRole('super');
         $ekraf->assignRole('ekraf');
         $budaya->assignRole('budaya');
         $pariwisata->assignRole('pariwisata');

        



        
    }
}
