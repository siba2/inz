<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info');
            $table->date('date');
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('schedule');
    }

}
