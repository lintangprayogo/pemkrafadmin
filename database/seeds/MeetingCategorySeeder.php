<?php

use Illuminate\Database\Seeder;
use App\Model\MeetingCategory;
class MeetingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingCategory::create(["name"=>"Kadis"]);
        MeetingCategory::create(["name"=>"Bidang"]);
     
    }
}
