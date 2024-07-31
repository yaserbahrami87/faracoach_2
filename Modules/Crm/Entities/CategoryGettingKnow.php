<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryGettingKnow extends Model
{
    //use HasFactory;

    protected $fillable = [
        'category','status','parent_id'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\CategoryGettingKnowFactory::new();
//    }

    public function categoryGettingKnow_children()
    {

        return $this->hasMany(CategoryGettingKnow::class,'parent_id','id');
    }

    public function categoryGettingKnow_parent()
    {

        return $this->belongsTo(CategoryGettingKnow::class,'parent_id','id');
    }
}
