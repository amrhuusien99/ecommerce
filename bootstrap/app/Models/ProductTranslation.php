<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model 
{

    protected $table = 'product_translations';
    public $timestamps = true;
    protected $fillable = array('name', 'local', 'description', 'short_description', 'product_id');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}