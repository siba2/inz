<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerwersmsTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('serwersms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sms_id');
            $table->string('phone');
            $table->string('text');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('serwersms');
    }

}
