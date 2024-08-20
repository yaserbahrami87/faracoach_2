<?php

namespace Modules\Ticket\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_send',
        'subject',
        'comment',
        'user_id_recieve',
        'ticket_id_answer',
        'date_fa',
        'time_fa',
        'type',
        'post_id',
        'status	'
    ];

    protected static function newFactory()
    {
        return \Modules\Ticket\Database\factories\TicketFactory::new();
    }

    public function ticket_user_send()
    {
        return $this->belongsTo(User::class,'user_id_send','id');
    }

    public function ticket_user_recieve()
    {
        return $this->belongsTo(User::class,'user_id_recieve','id');
    }

}
