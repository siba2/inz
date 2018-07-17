<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('cash', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer');
            $table->string('comment');
            $table->string('value');
            $table->date('date');
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('cash');
    }

}
