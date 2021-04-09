<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model 
{

    protected $table = 'brand_translations';
    public $timestamps = true;
    protected $fillable = array('name', 'local', 'brand_id');

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

}