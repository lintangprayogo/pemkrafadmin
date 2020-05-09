<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultureSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culturesites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("register_date")->nullable();
            $table->string("register_number")->nullable();
            $table->string("object_name")->nullable();
            $table->string("object_category")->nullable();
            $table->string("object_exist")->nullable();
            $table->string("object_address")->nullable();
            $table->string("kelurahan")->nullable();
            $table->string("kecamatan")->nullable();
            $table->string("kabupaten")->nullable();
            $table->string("provinsi")->nullable();
            $table->string("cordinate")->nullable();
            $table->string("height")->nullable();
            $table->string("photo")->nullable();
            $table->string("thumbnail")->nullable();
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
        Schema::dropIfExists('culturesites');
    }
}
