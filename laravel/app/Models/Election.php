<?php

namespace App\Models;



class Election extends Model
{
    public function parties(){
        return $this->belongsToMany(Parties::class);
    }
    public function city(){
        return $this->belongsTo(Cities::class);
    }
}
