<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable=['name','address','location_id'];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function advert(){
        return $this->hasMany(Advert::class);
    }
}
