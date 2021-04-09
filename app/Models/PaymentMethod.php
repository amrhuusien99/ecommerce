<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class PaymentMethod extends Model 
{
    use Translatable;

    protected $table = 'payment_methods'; 
    public $timestamps = true;
    protected $fillable = array('is_activate');

    protected $with = ['translation'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];


    public function scopeActive($query)
    {
        return $query -> where('is_activate',1) ;
    }

}