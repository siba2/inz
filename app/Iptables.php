<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iptables extends Model {

    protected $connection = 'mysql_manager';
    protected $table = 'iptables';
    public $timestamps = false;

}
