<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IptablesClasses extends Model {

    protected $connection = 'mysql_manager';
    protected $table = 'iptables_classes';
    public $timestamps = false;

}
