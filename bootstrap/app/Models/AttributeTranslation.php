<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model 
{

    protected $table = 'attribute_translations';
    public $timestamps = true;
    protected $fillable = array('name', 'local', 'attribute_id');

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

}