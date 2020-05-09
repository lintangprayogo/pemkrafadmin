<?php

use Illuminate\Database\Seeder;
use App\Model\EventCategory;
class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventCategory::create(["name"=>"Ekraf"]);
        EventCategory::create(["name"=>"Pariwisata"]);
        EventCategory::create(["name"=>"Budaya"]);
    }
}
