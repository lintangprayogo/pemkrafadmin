<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMeeting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("meeting_name");
            $table->string("initiator");
            $table->date("meeting_date");
            $table->string("meeting_agenda");
            $table->string("kind");
            $table->string("participant");
            $table->string("data_source");
            $table->string("documentation_report")->nullable();
            $table->string("documentation_url")->nullable();
            $table->unsignedBigInteger("meeting_category_id")->nullable();
            $table->foreign('meeting_category_id')->references('id')->on('meeting_categories')->onDelete('cascade');
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
        Schema::dropIfExists('meetings');
    }
}
