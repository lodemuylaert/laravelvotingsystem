<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Voterroles extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}