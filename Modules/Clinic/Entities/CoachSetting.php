<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoachSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'setting',
        'value',
        'option',
        'status'
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\CoachSettingFactory::new();
    }
}
