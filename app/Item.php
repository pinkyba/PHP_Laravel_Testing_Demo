<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Item extends Model
{
    protected $fillable = [
            'photo','codeno', 'name', 'price', 'discount', 'description', 'brand_id', 'subcategory_id'
        ];
}
