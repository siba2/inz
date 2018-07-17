<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffsTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('value', 8, 2);
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('tariffs');
    }

}
