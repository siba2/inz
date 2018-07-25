<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasPermissions extends Model {

    protected $connection = 'mysql';
    protected $table = 'model_has_permissions';
    
    public $timestamps = false;

}
