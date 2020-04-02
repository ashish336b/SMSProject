<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendnotice', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('to', ['Student', 'Teacher', 'Both']); //1 for student 2 for teacher 3 for both
            $table->string('subject');
            $table->string('message',9999);
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
        Schema::dropIfExists('sendnotice');
    }
}
