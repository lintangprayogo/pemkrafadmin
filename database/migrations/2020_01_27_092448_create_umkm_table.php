<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("umkm_name");
            $table->string("owner")->nullable();
            $table->string("umkm_permission_name")->nullable();
            $table->string("umkm_permission_number")->nullable();
            $table->string("npwp")->nullable();
            $table->string("year")->nullable();
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
            $table->string("business_form")->nullable();
            $table->string("business_sector")->nullable();
            $table->string("data_year")->nullable();
            $table->integer("male_employe")->nullable();
            $table->integer("female_employe")->nullable();
            $table->integer("male_labor")->nullable();
            $table->integer("female_labor")->nullable();
            $table->string("capacity")->nullable();
            $table->string("turnover")->nullable();
            $table->string("asset")->nullable();
            $table->string("logo")->nullable();
            $table->string("independent_capital")->nullable();
            $table->string("external_capital")->nullable();
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("data_resource")->nullable();
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
        Schema::dropIfExists('umkm');
    }
}
