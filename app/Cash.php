<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $connection = 'mysql_manager';

    protected $table = 'cash';
}
