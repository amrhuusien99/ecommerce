<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionTranslation extends Model 
{

    protected $table = 'option_translations';
    public $timestamps = true;
    protected $fillable = array('name', 'local', 'option_id');

    public function options()
    {
        return $this->belongsTo('App\Models\Option');
    }

}