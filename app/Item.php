<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Item extends Model
{
    protected $fillable = [
            'photo','codeno', 'name', 'price', 'discount', 'description', 'brand_id', 'subcategory_id'
        ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

	public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
