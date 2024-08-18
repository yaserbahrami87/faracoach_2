<?php

namespace Modules\RequestPortal\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestPortal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'user_id',
        'date_fa',
        'time_fa',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\RequestPortal\Database\factories\RequestPortalFactory::new();
    }

    public function status()
    {
        switch ($this->status)
                {
                    case 0:return 'ارسال درخواست';
                            break;
                    case 1:return 'در حال بررسی';
                            break;
                    case 2:return 'تائید';
                            break;
                    case 3:return 'رد درخواست';
                            break;
                    default:return "خطا";
                }




    }
}
