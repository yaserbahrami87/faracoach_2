<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
//    use HasFactory;

    protected $fillable = [
        'type','code','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\UserTypeFactory::new();
//    }

    public function followups()
    {
        return $this->hasMany(Followup::class,'status_followups','id');
    }

    public function User()
    {
        return $this->hasMany(\App\User::class,'type','code');
    }
}
