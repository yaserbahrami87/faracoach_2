<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clinic\Entities\Coach;
use Modules\Event\Entities\EventOrganizer;
use Modules\Lms\Entities\Exam;
use Modules\Lms\Entities\Student;
use Modules\Lms\Entities\Teacher;

class User extends Model
{


    protected $fillable = [
        'fname','lname','tel','tel_verified','email','password','username','fname_en','lname_en','sex','datebirth','father','codemelli','shenasname','born','education','reshteh','job','organization','jobside','address','personal_image','shenasnameh_image','cartmelli_image','education_image','resume','married','type','resource','introduced','followby_expert','insert_user_id','telegram','instagram','linkedin','aboutme','last_login_at'
    ];

    public function categoryGettingKnow()
    {
        return  $this->belongsTo(CategoryGettingKnow::class,'gettingknow','id');
    }

    //نمایش معرف
    public function get_introduced()
    {
        return $this->belongsTo(\Modules\Crm\Entities\User::class,'introduced','id');
    }


    //تعداد معرفی شده های هر نفر
    public function get_invitation()
    {
        return $this->hasMany(\App\User::class,'introduced','id');

    }

    //دریافت اطلاعات ثبت کننده
    public function get_insertuserInfo()
    {
        return $this->belongsTo(User::class, 'insert_user_id', 'id');
    }

    //سوابق پیگیری هر کاربر
    public function followups()
    {
        return $this->hasMany(Followup::class,'user_id','id');
    }


    public function insertFollowups()
    {
        return $this->hasMany(Followup::class,'insert_user_id','id');
    }

    //مسئول پیگیری  هر کاربر را برمیگراند
    public function get_followByExpert()
    {
        return $this->belongsTo(User::class, 'followby_expert', 'id');
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class,'type','code');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'user_id','id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
