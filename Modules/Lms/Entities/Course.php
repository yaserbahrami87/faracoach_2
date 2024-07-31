<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\Followup;

class Course extends Model
{
//    use HasFactory;

    protected $fillable = [
        'course','shortlink','image','duration','duration_date','start','end','course_days','course_times','infocourse','exam','fi','type_peymant_id','prepayment','peymant_off','status','special','courseType_id','count_students','fi_off'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\CourseFactory::new();
//    }

    public function getRouteKeyName()
    {
        return "shortlink";
    }

    public function followups()
    {
        return $this->hasMany(Followup::class,'course_id','id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
