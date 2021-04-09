<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = array('slug');

    public function tags()
    {
        return $this->hasMany('App\Models\TagTranslation');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}