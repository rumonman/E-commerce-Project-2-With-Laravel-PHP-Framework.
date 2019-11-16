<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Futureproduct extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'name', 'title', 'description','code','product_image',
    ];
}
