<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatMeetTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('meet_id');
            $table->integer('tag_id');

            $table->foreign('meet_id')->references('id')->on('meetings');
            $table->foreign('tag_id')->references('id')->on('tags');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meet_tags');
    }
}
