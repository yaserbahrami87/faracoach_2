<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\User;

class EventParticipants extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'date_fa',
        'time_fa'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Event\Database\factories\EventParticipantsFactory::new();
//    }

      public function user()
      {
          return $this->belongsTo(User::class);
      }
}
