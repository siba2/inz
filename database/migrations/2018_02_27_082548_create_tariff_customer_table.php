<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffCustomerTable extends Migration
{
    
    public function up()
    {
        Schema::connection('mysql_manager')->create('tariffs_customer', function (Blueprint $table) {
            $table->integer('id_customer');
            $table->integer('id_traffis');
        });
    }

    
    public function down()
    {
         Schema::connection('mysql_manager')->dropIfExists('tariffs_customer');
    }
}
