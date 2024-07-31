<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Problemfollowup extends Model
{
//    use HasFactory;

    protected $fillable = [
        'problem','color','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\ProblemfollowupFactory::new();
//    }

    public function followups()
    {
        return $this->hasMany(Followup::class,'problemfollowup_id','id');
    }
}
