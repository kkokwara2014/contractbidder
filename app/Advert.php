<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    

    public function ministry(){
        return $this->belongsTo(Ministry::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bidding(){
        return $this->hasMany(Bidding::class);
    }
}
