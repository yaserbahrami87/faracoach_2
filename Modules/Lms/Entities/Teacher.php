<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\User;

class Teacher extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','biography','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\TeacherFactory::new();
//    }
}
