<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("exhibition_name");
            $table->string("description");
            $table->string("start_date");
            $table->string("end_date");
            $table->string("poster");
            $table->string("price");
            $table->string("location");
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibition');
    }
}
