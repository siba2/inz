<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model {

    protected $connection = 'mysql_manager';
    protected $table = 'tariffs';
    
    public $timestamps = false;
}
