<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    protected $connection = 'mysql';
    protected $table = 'role_has_permissions';
    
    public $timestamps = false;
}
