<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
//    use HasFactory;

    protected $fillable = [
        'event','shortlink','event_text','description','fi','image','capacity','type','address','heading','contacts','faq','video','links','expire_date','start_date','end_date','start_time','end_time','duration','options','status','user_id'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Event\Database\factories\EventFactory::new();
//    }

    public function getRouteKeyName()
    {
        return "shortlink";
    }

    public function eventOrganizers()
    {
        return $this->belongsToMany(EventOrganizer::class,'event_eventorganizer','event_id','eventorganizer_id');
    }
}
