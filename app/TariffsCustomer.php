<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TariffsCustomer extends Model
{
    protected $connection = 'mysql_manager';
    protected $table = 'tariffs_customer';
    
    public $timestamps = false;
}
