<?php

namespace Modules\Lms\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamQuestion extends Model
{
//    use HasFactory;

    protected $fillable = [
        'title','is_question','question_id','is_correct','user_id','score','exam_id','date_fa','time_fa'
    ];


//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\ExamQuestionFactory::new();
//    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers()
    {
        return $this->hasMany(ExamQuestion::class,'question_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam_results()
    {
        return $this->hasMany(ExamResult::class,'exam_question_id','id');
    }

    public function result_user()
    {
        return $this->hasMany(ExamResult::class,'result_id','id');
    }
}
