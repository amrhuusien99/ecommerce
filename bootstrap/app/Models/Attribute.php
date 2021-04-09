<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model 
{

    protected $table = 'attributes';
    public $timestamps = true;

    public function attributes()
    {
        return $this->hasMany('App\Models\AttributeTranslation');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

}