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
}
