<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIptablesTable extends Migration {

    public function up() {
        Schema::connection('mysql_manager')->create('iptables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer');
            $table->bigInteger('ipaddr');
            $table->string('mac');
            $table->string('comment');
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('iptables');
    }

}
