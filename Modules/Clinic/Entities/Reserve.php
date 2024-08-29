<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','booking_id','subject','description','type_booking','fi','off','type_discount','coupon','final_fi','status','result','cliniccategory_id','date_fa','time_fa'
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\ReserveFactory::new();
    }
}
