<?php

namespace Modules\Event\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventOrganizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','biography','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Event\Database\factories\EventOrganizerFactory::new();
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
