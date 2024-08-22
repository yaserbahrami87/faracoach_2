<?php

namespace Modules\Clinic\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'start_date',
        'start_time',
        'status',
        'date_fa',
        'time_fa',
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\BookingFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(Coach::class);
    }
}
