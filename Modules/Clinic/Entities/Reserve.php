<?php

namespace Modules\Clinic\Entities;

use App\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function status()
    {
        switch($this->status)
        {

            case 0:return "رزرو در انتظار تائید";
                break;
            case 10:return "رزرو تائید شده";
                break;
            case 11:return "رد شده توسط کوچ";
                break;
            case 12:return "رد شده توسط مراجع";
                    break;
            case 2:return 'برگزارشد';
                break;
            case 3:
                return 'لغو توسط مراجع';
                break;
            case 4:
                return 'لغو توسط کوچ';
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
            '0'=> "رزرو در انتظار تائید",
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

    public function clinicCategory()
    {
        return $this->belongsTo(ClinicCategory::class,'cliniccategory_id','id');
    }

}
