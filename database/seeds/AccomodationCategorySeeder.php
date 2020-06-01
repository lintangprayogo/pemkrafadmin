<?php

use Illuminate\Database\Seeder;
use App\Model\ AccommodationCategory;

class AccomodationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       AccommodationCategory::create(["name"=>"Hotel"]);
       AccommodationCategory::create(["name"=>"Villa"]);
        
    }
}
