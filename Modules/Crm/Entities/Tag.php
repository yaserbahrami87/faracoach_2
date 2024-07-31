<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
//    use HasFactory;

    protected $fillable = [
        'tag','tag_category_id','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\TagFactory::new();
//    }

    public function tagCategory()
    {
        return $this->belongsTo(TagCategory::class,'tag_category_id','id');
    }
}
