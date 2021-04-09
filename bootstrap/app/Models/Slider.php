<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model 
{

    protected $table = 'sliders';
    public $timestamps = true;
    protected $fillable = array('is_activate');

    public function sliders()
    {
        return $this->hasMany('App\Models\SliderTranslation');
    }

}