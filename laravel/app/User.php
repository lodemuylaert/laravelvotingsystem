<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Voterroles;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{

    use Notifiable, Sortable;

    public $sortable = [
        'name',
        'id'

    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function voterrole()
    {
        return $this->hasOne(Voterroles::class);
    }


    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function addVote($candidates, $partie){

        $vote = new Vote([
            'user_id' => $this->id,
            'candidates' => $candidates,
            'partie' => $partie,
            'election_id' => 1,
            'created_at' => Carbon::now('Europe/Brussels'),
            'updated_at' => Carbon::now('Europe/Brussels')
        ]);
        $vote->save();
    }
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("id", "=", "$keyword")
                    ->orWhere("email", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
