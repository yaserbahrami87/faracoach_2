<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagCategory extends Model
{
//    use HasFactory;

    protected $fillable = [
        'category','parent_id','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Crm\Database\factories\TagCategoryFactory::new();
//    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'tag_category_id','id');
    }

    public function tagCategoryChildren()
    {
        return $this->hasMany(TagCategory::class,'parent_id','id');
    }
}
