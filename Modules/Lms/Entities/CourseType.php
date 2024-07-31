<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','shortlink','status'
    ];

    public function getRouteKeyName()
    {
        return "shortlink";
    }

    protected static function newFactory()
    {
        return \Modules\Lms\Database\factories\CourseTypeFactory::new();
    }
}
