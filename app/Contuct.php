<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contuct extends Model
{
	use SoftDeletes;
     protected $fillable = [
        'name', 'email','subject','message','deleted_at'
    ];
}
