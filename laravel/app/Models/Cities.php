<?php

namespace App\Models;



class Cities extends Model
{
    public function election(){
        return $this->hasOne(Election::class);
    }
}
