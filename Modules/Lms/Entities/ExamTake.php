<?php

namespace Modules\Lms\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamTake extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','exam_id','score','status','date_fa','time_fa'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\ExamTakeFactory::new();
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
