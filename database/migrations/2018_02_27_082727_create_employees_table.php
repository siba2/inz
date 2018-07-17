<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->string('phone');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('employees');
    }

}
