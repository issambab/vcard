<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    public $table = 'salon' ;
    public function Enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}

    public function candidat()
	{
		return $this->belongsTo(Candidat::class);
	}
    
}
