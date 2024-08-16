<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoachType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\CoachTypeFactory::new();
    }
}
