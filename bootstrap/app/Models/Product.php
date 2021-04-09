<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('slug', 'photo', 'quantity', 'sku', 'price', 'speecial_peice', 'selling_price', 'special_peice_tayp', 'special_peice_start', 'special_peice_end', 'manage_stoke', 'is_stock', 'is_activate', 'brand_id');

    public function products()
    {
        return $this->hasMany('App\Models\ProductTranslation');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function favorates()
    {
        return $this->hasMany('App\Models\Favorate');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

}