<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable 
{

    protected $table = 'vendors';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'photo', 'address', 'delivery_cost', 'minimum_order', 'is_activate', 'state', 'special_vendor', 'pin_code', 'api_token');

    public function scopeActive($query) 
    {
        return $query -> where('is_activate', 1) ;
    }

    public function scopeSpecial_vendor($query)
    {
        return $query -> where('special_vendor', 1) ;
    }
    
    public function products() 
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }

    public function productHas($product_id)
    {
        return $this->products()->where('id', $product_id)->first();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'vendor_id');
    }

    public function notification()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }

}