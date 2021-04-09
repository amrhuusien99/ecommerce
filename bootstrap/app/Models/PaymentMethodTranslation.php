<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodTranslation extends Model 
{

    protected $table = 'payment_method_translations';
    public $timestamps = true;
    protected $fillable = array('name');

    public function method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

}