<?php

namespace Modules\RequestPortal\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clinic\Entities\ClinicCategory;
use Modules\Ticket\Entities\Ticket;

class RequestPortal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'user_id',
        'date_fa',
        'time_fa',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\RequestPortal\Database\factories\RequestPortalFactory::new();
    }

    public function status()
    {
        switch ($this->status)
                {
                    case 0:return 'ارسال درخواست';
                            break;
                    case 1:return 'در حال بررسی';
                            break;
                    case 2:return 'تائید';
                            break;
                    case 3:return 'رد درخواست';
                            break;
                    default:return "خطا";
                }
    }

    public function listStatus()
    {
        return[
            '0' =>'ارسال درخواست',
            '1' =>'در حال بررسی',
            '2' =>'تائید',
            '3' =>'رد درخواست',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinicCategoriesRequestPortal()
    {
        return $this->belongsToMany(ClinicCategory::class,'cliniccategory_coach','request_portal_id','cliniccategory_id')
            ->withPivot('request_portal_id')
            ->withPivot('status');

    }

    public function ticketsCoach()
    {
        return $this->hasMany(Ticket::class,'post_id','id')
                                                    ->wherein('type',['coach','coach_request','coach_service_request']);
    }


}
