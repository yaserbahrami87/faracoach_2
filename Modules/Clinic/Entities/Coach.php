<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\User;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'education_background',
        'researches',
        'certificates',
        'experience',
        'skills',
        'count_meeting',
        'coach_type_id',
        'status',
        'fi',
        'address',
        'online_platform',
        'tel',
        'today_meeting',
        'confirm_faracoach',
        'student_meeting',
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\CoachFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coachcategories()
    {
        return $this->belongsToMany(CoachCategory::class,'coach_coachcategory','coach_id','coachcategory_id');
    }

    public function cliniccategories()
    {
        return $this->belongsToMany(ClinicCategory::class,'cliniccategory_coach','coach_id','cliniccategory_id')
                        ->withPivot('request_portal_id')
                        ->withPivot('status');
    }

    public function coachSettings()
    {
        return $this->hasMany(CoachSetting::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


}
