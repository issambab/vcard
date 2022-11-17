<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
