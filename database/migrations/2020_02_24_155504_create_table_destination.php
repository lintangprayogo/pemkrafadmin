<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("destination_name");
            $table->string("address")->nullable();
            $table->string("RT")->nullable();
            $table->string("RW")->nullable();
            $table->string("kelurahan")->nullable();
            $table->string("kecamatan")->nullable();
            $table->string("kabupaten")->nullable();
            $table->string("provinsi")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("fax")->nullable();
            $table->string("website")->nullable();
            $table->unsignedBigInteger("destination_category_id")->nullable();
            $table->foreign('destination_category_id')->references('id')->on('destination_categories')->onDelete('cascade');
               $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("photo")->nullable();
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
        Schema::dropIfExists('table_destination');
    }

}
