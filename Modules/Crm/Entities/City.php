<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','state_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Crm\Database\factories\CityFactory::new();
    }
}
