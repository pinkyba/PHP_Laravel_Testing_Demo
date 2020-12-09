<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Subcategory extends Model
{
	// create Subcategory model of column from subcategory 
    protected $fillable = [
    	'name', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
