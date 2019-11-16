<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'name', 'title', 'description','quantity','code','price','deleted_at','product_image','category_id'
    ];

    public function relationcategory()
    {
    	return $this->hasOne('App\Category','id','category_id');
    }
}
