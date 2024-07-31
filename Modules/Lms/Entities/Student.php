<?php

namespace Modules\Lms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Entities\User;

class Student extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id','course_id','status','date_fa','time_fa','code','date_gratudate','identify_code'
    ];

    public function get_status()
    {

        switch ($this->status)
        {
            case 1:
                return ('دانشجو');
                break;
            case 2:
                return ('انصراف');
                break;
            case 3:
                return ('فارغ التحصیل ACSTH');
                break;
            case 31:
                return ('فارغ التحصیل FC1');
                break;
            case 4:
                return ('مرخصی');
                break;
            case 5:
                return ('بلاتکلیف');
                break;
            case 6:
                return ('اخراج');
                break;
            default: return ('خطا');

        }
    }

    public function status()
    {
        return [
            '1' =>'دانشجو',
            '2' => 'انصراف',
            '3' =>'فارغ التحصیل ACSTH',
            '31'=>'فارغ التحصیل FC1',
            '4' =>'مرخصی',
            '5' =>'بلاتکلیف',
            '6' =>'اخراج',
        ];
    }

//    protected static function newFactory()
//    {
//        return \Modules\Lms\Database\factories\StudentFactory::new();
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
