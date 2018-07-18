<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsapiTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('smsapi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sms_id');
            $table->string('phone');
            $table->string('text');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('smsapi');
    }

}
