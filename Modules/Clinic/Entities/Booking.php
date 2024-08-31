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
        'end_date',
        'end_time',
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\BookingFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(Coach::class);
    }

    public function status()
    {
        switch($this->status)
            {
                case 0:return "در انتظار رزرو";
                        break;
                case 1:return "رزرو در انتظار تائید";
                        break;
                case 10:return "رزرو تائید شده";
                        break;
                case 11:return "رد شده توسط کوچ";
                        break;
                case 2:return 'برگزارشد';
                        break;
                case 3:
                    return 'کنسل توسط مراجع';
                    break;
                case 4:
                    return 'کنسل توسط کوچ';
                    break;
                case 5:
                    return  'غیبت مراجع';
                    break;
                case 6:
                    return  'غیبت کوچ';
                    break;
                default: return 'خطا';

        }

    }

    public function getStatus()
    {
        return [
          '0'=> "در انتظار رزرو",
          '1'=> "رزرو در انتظار تائید",
          '10'=> "رزرو تائید شده",
          '11'=> "رد شده توسط کوچ",
          '12'=> "رد شده توسط مراجع",
          '2'=>'برگزارشد',
          '3'=> 'لغو توسط مراجع',
          '4'=> 'لغو توسط کوچ',
          '5'=>  'غیبت مراجع',
          '6'=>'غیبت کوچ',
        ];
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
