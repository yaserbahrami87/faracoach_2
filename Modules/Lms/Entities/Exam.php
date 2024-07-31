<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\User;

class Exam extends Model
{
//    use HasFactory;

    protected $fillable = [
        'exam','description','certificate_id','pass','user_id','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\ExamFactory::new();
//    }

    public function getRouteKeyName()
    {
        return 'exam';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function examTakes()
    {
        return $this->hasMany(ExamTake::class);
    }
}
