<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('zip');
            $table->string('city');
            $table->string('phone');
            $table->string('address');
            $table->string('info');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('customers');
    }

}
