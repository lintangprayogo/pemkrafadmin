<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccommodation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("accommodation_name");
            $table->String("star");
            $table->unsignedBigInteger("accommodation_category_id")->nullable();
            $table->String("location");
            $table->String("kelurahan")->nullable();
            $table->String("kecamatan")->nullable();
            $table->String("provinsi")->nullable();
            $table->String("cordinate")->nullable();
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("photo")->nullable();
            $table->foreign('accommodation_category_id')->references('id')->on('accommodation_categories')->onDelete('cascade');
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
        Schema::dropIfExists('accommodations');
    }
}
