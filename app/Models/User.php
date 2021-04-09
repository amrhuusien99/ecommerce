<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable; 
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'email', 'password', 'phone', 'pin_code', 'is_activate', 'api_token' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function scopeActive($query)
    {
        return $query -> where('is_activate', 1);
    }

    public function carts()
    {
        return $this->belongsToMany(Product::class, 'carts')->withTimestamps();
    }

    public function cartHas($product_id)
    {
        return self::carts()->where('product_id', $product_id)->exists();
    }

    public function favorates()
    {
        return $this->belongsToMany(Product::class, 'favorates')->withTimestamps();
    }

    public function favorateHas($productId)
    {
        return self::favorates()->where('product_id', $productId)->exists();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'orders');
    }

}
