<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function advert(){
        return $this->belongsTo(Advert::class);
    }
}
