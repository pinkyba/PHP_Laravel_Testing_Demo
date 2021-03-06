<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Category extends Model
{

    protected $fillable = [
    	'name', 'photo'
    ];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    // hasManyThrough relationship category and item// subcategory is between category and item
    public function items()
    {
        return $this->hasManyThrough('App\Item', 'App\Subcategory');
    }
}
