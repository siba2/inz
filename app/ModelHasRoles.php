<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    protected $connection = 'mysql';
    protected $table = 'model_has_roles';
    
    public $timestamps = false;
}
