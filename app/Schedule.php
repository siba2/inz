<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {

    protected $connection = 'mysql_manager';
    protected $table = 'schedule';
    
    public $timestamps = false;

}
