<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorate extends Model 
{

    protected $table = 'favorates';
    public $timestamps = true;
    protected $fillable = array('user_id', 'product_id');

    public function user()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}