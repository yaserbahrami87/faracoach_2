<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Modules\Crm\Entities\CategoryGettingKnow;
use Modules\Crm\Entities\Followup;
use Modules\Crm\Entities\UserType;
use Modules\Lms\Entities\Exam;
use Modules\Lms\Entities\ExamQuestion;
use Modules\Lms\Entities\ExamResult;
use Modules\Lms\Entities\ExamTake;
use Modules\Lms\Entities\Student;
use Modules\Lms\Entities\Teacher;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','tel','tel_verified', 'email', 'password','username','fname_en','lname_en','sex','datebirth','father','codemelli','shenasname','born','education','reshteh','job','organization','jobside','address','personal_image','shenasnameh_image','cartmelli_image','education_image','resume','married','type','resource','introduced','followby_expert','insert_user_id','telegram','instagram','linkedin','aboutme','last_login_at','gettingknow'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
        return $this->hasMany(User::class,'introduced','id');

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

    public function examInsert()
    {
        return $this->hasMany(Exam::class);
    }

    public function examQuestion_insert()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function examResult_insert()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function takeExams()
    {
        return $this->hasMany('Modules\Exam\Entities\TakeExam');
    }

    public function ExamTakes()
    {
        return $this->hasMany(ExamTake::class);
    }

    public function is_employee()
    {
        return (Auth::user()->type ==2 || Auth::user()->type ==3 || Auth::user()->type==4 || Auth::user()->type==5|| Auth::user()->type==6 || Auth::user()->type==7);
    }

}
