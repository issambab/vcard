<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	// use SoftDeletes;
      public $table = 'products' ;
   
    public function code_carte()
	{
		return $this->belongsTo(Code_carte::class);
	}
}
