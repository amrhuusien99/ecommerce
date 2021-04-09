<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('pairnt_id', 'slug', 'is_activate');

    public function categories()
    {
        return $this->hasMany('App\Models\CategoryTranslation');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}