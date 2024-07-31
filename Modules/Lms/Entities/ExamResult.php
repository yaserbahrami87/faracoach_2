<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamResult extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','exam_id','exam_question_id','result_id','date_fa','time_fa'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\ExamResultFactory::new();
//    }
}
