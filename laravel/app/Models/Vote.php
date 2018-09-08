<?php

namespace App\Models;

use App\User;
use Kyslik\ColumnSortable\Sortable;
use Ramsey\Uuid\Uuid;
use CreateVotesTable;
use DB;

class Vote extends Model
{
    use Sortable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'candidates' => 'json', // Casts array to JSON and vice versa.
    ];

    public $sortable = [
        'created_at'

    ];
    /**
     * The primary key for the model.
     *
     * @var string
     */
//    protected $primaryKey = CreateVotesTable::PK;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
//    protected static function boot()
//    {
//        parent::boot();
//
//        /**
//         * Register a creating model event with the dispatcher.
//         */
//        static::creating(function (Vote $vote) {
//            // Create Universally Unique Identifier.
//            do {
//                $uuid = Uuid::uuid4()->toString(); // @see https://github.com/ramsey/uuid
//            } while (DB::table(CreateVotesTable::TABLE)
//                ->select(CreateVotesTable::PK)
//                ->where(CreateVotesTable::PK, $uuid)
//                ->exists());
//            $vote->uuid = $uuid;
//
//            // Create Checksum, assume password
//            $data = $vote->getAttributes();
//            ksort($data);
//            $value = hash('sha512', (json_encode($data)) . $vote->checksum);
//            // \Log::debug([$data, $value]);
//            $vote->checksum = bcrypt($value);
//        });
//    }
}
