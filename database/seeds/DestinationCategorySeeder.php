<?php

use Illuminate\Database\Seeder;
use App\Model\DestinationCategory;
class DestinationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinationCategory::create(["name"=>"Situ"]);
        DestinationCategory::create(["name"=>"Air Terjun"]);
        DestinationCategory::create(["name"=>"Gua"]);
        DestinationCategory::create(["name"=>"Wisata"]);
        DestinationCategory::create(["name"=>"Kolam Wisata"]);
        DestinationCategory::create(["name"=>"Wisata Kuda"]);
        DestinationCategory::create(["name"=>"Resto & Outbond"]);
        DestinationCategory::create(["name"=>"Resto & Villa"]);
        DestinationCategory::create(["name"=>"Wisata Edukasi & Ilmiah"]);
        DestinationCategory::create(["name"=>"Wisata Bunga"]);
        DestinationCategory::create(["name"=>"Wisata Alam"]);
        DestinationCategory::create(["name"=>"Outbond"]);
        DestinationCategory::create(["name"=>"Lainnya"]);

    }
}
