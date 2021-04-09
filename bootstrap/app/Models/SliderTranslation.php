<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model 
{

    protected $table = 'slider_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'description', 'local', 'slider_id');

    public function slider()
    {
        return $this->belongsTo('App\Models\Slider');
    }

}