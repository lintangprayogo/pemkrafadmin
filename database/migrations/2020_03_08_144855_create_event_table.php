<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("event_name");
            $table->string("description");
            $table->string("start_date");
            $table->string("end_date");
            $table->string("poster");
            $table->string("price");
            $table->string("location");
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
              $table->unsignedBigInteger("event_category_id")->nullable();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
