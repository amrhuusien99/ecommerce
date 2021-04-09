<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model 
{

    protected $table = 'tags_translations';
    public $timestamps = true;
    protected $fillable = array('name', 'local', 'tag_id');

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

}