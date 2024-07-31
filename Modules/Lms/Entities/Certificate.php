<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','cartificate','product_id','type','status'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\CertificateFactory::new();
//    }
}
