<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model 
{

    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = array('photo', 'is_activate');

    public function brands()
    {
        return $this->hasMany('App\Models\BrandTranslation');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}