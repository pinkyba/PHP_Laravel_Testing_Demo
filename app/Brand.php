<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Brand extends Model
{
	
    protected $fillable = [
    	'name', 'photo'
    ];
}
