<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model 
{

    protected $table = 'vendors';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'photo', 'address', 'is_activate', 'pin_code', 'api_token');

    public function notification()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }

}