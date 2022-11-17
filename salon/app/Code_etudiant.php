<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code_etudiant extends Model
{
   // use SoftDeletes;
    public $table = 'code_etudiants' ;
  //  protected $dates = ['deleted_at']; 

    public function candidats()
	{
		return $this->belongsTo(Candidat::class);
	}


          
}
