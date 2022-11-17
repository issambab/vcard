<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidat extends Model
{
	// use SoftDeletes;
      public $table = 'candidats' ;

	  public function user()
	  {
		  return $this->belongsTo(User::class);
	  }
   
    public function salon()
	{
		return $this->belongsTo(Salon::class);
	}

	public function code_carte()
	{
		return $this->belongsTo(Code_carte::class);
	}

	
}
