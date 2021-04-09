<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model 
{

    protected $table = 'options';
    public $timestamps = true;
    protected $fillable = array('attribute_id', 'product_id');

    public function options()
    {
        return $this->hasMany('App\Models\OptionTranslation');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}