<?php

namespace App\Models;



class Parties extends Model
{
    protected $fillable = [
        'name', 'description', 'deleted', 'imgurl',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    public function candidates(){
        return $this->hasMany(Candidates::class);
    }
    public function elections(){
        return $this->belongsToMany(Election::class, Election_Parties);
    }
    public function addimage(){

    }
    public function softdelete(){
        $this->update(['deleted' => true]);
    }
    public function softundelete(){
        $this->update(['deleted' => false]);
    }


}
