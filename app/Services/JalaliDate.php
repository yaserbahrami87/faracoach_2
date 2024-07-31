<?php

namespace App\Services;
use Hekmatinasser\Verta\Verta;

class JalaliDate
{
    public $dateNow;
    public function __construct()
    {
        $this->dateNow=verta();
    }

    public static function get_jalaliNow()
    {
        return (verta()->format('Y/m/d'));

    }

    public static function get_timeNow()
    {
        return verta()->format('H:i:s');
    }

    //تبدیل تاریخ میلادی به شمسی
    public static function changeTimestampToShamsi($date)
    {
        $dateMiladi = new verta($date);
        return ($dateMiladi->hour . ":" . $dateMiladi->minute . "  " . $dateMiladi->year . "/" . $dateMiladi->month . "/" . $dateMiladi->day);
    }
}
