<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoachCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\CoachCategoryFactory::new();
    }


}
