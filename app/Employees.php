<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $connection = 'mysql_manager';

    protected $table = 'employees';
}
