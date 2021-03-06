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
            $table->dateTime('meeting_time');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('coordinates')->nullable();

            $table->smallinteger('participants_need');
            $table->smallinteger('participants_have')->nullable();
            $table->smallinteger('diff')->nullable();
            $table->integer('owner_id')->nullable();
            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('owner_id')->references('id')->on('users');
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
