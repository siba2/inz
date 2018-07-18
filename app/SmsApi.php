<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsApi extends Model {

    protected $connection = 'mysql_manager';
    protected $table = 'smsapi';

}
