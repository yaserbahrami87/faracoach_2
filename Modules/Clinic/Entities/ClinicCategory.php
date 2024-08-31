<?php

namespace Modules\Clinic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClinicCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','title','description','parent_id','status'
    ];

    protected static function newFactory()
    {
        return \Modules\Clinic\Database\factories\ClinicCategoryFactory::new();
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function parent_category()
    {
        return $this->belongsTo(ClinicCategory::class,'parent_id','id');
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class,'cliniccategory_id','id');
    }




}
