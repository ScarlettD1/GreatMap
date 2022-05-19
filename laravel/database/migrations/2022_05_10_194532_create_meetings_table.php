<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('status');
            $table->dateTime('meeting_time');
            $table->dateTime('show_time');
            $table->string('name');
            $table->string('description')->nullable();

//            $table->foreign('tag_id')->references('id')->on('meet_tags');

            $table->smallinteger('participants_need');
            $table->smallinteger('participants_have');
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
