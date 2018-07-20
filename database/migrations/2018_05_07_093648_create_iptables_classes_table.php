<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIptablesClassesTable extends Migration
{
   public function up() {
        Schema::connection('mysql_manager')->create('iptables_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('class');         
        });
    }

    public function down() {
        Schema::connection('mysql_manager')->dropIfExists('iptables_classes');
    }
}
