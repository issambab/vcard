<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imprimeur extends Model
{
   // use SoftDeletes;
    public $table = 'imprimeurs' ;
  //  protected $dates = ['deleted_at']; 

  
      public function user()
        {
            return $this->belongsTo(User::class, 'foreign_key');
        }
          
}
