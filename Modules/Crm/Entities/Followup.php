<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lms\Entities\Course;

class Followup extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','insert_user_id','comment','talktime','tags','nextfollowup_date_fa','sms','flag','date_fa','time_fa','datetime_fa','problemfollowup_id','status_followups','course_id'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\FollowupFactory::new();
//    }

    public function problemFollowup()
    {
        return $this->belongsTo(Problemfollowup::class,'problemfollowup_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class,'status_followups','code');
    }

    public function insertUser()
    {
        return $this->belongsTo(\App\User::class,'insert_user_id','id');
    }
}
