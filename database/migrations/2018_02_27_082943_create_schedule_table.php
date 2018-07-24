<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('schedule');
    }

}
