<?php

namespace App\Models;



class Candidates extends Model
{

    public function parties(){
        return $this->belongsTo(Parties::class);
    }
    public function softdelete(){
        $this->update(['deleted' => true]);
    }
    public function softundelete(){
        $this->update(['deleted' => false]);
    }

}
