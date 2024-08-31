<?php

namespace Modules\Clinic\Http\Controllers\User\Coach;

use App\Services\JalaliDate;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Modules\Clinic\Entities\Booking;
use Modules\Crm\Entities\Setting;


class BookingController extends Controller
{
    protected $is_coach;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->is_coach)
            {
                return $next($request);
            }
            else
            {
                alert()->warning('شما اجازه دسترسی به این صفحه را ندارید');
                return back();
            }


        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('clinic::user.coach.booking.booking');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('clinic::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date'  =>  'required|string',
            'start_time'  =>'required|date_format:H:i',
        ]);

        $setting_coaching_duration_time=Setting::where('setting','coaching_duration_time')
                                ->first();

        if(is_null($setting_coaching_duration_time))
        {
            alert()->error('تنظیمات جلسات توسط کارشناس کلینیک بارگذاری نشده است');
            return back();
        }
        else
        {
            $setting_coaching_duration_time=$setting_coaching_duration_time->value;
            $dates=explode(' ~ ',$request->start_date);
            $dates=Arr::sort($dates);

            foreach ($dates as $date)
            {
                if(($date<=JalaliDate::get_jalaliNow())&&($request->start_time<=JalaliDate::get_timeNow()))
                {
                    alert()->error('تاریخ و ساعت انتخاب شده منقضی شده است')->persistent('بستن');
                    return back();
                }

                $check=Booking::where('start_date', '=', $date)
                    ->where('coach_id','=',Auth::user()->coach->id)
                    ->where('start_time', '=', $request->start_time)
                    ->first();

                if(!is_null($check))
                {
                    $msg="تاریخ ".$date." در ساعت ".$request->start_time." قبلا تنظیم شده است.لطفا تاریخ ها را مجدد تنظیم کنید";
                    alert()->error($msg,'خطا')->persistent('بستن');
                    return back();
                }

                $carbon = new Carbon($date." ".$request->start_time);
                $check = booking::where('start_date', '=', $date)
                    ->where('coach_id','=',Auth::user()->coach->id)
                    ->where(function($q) use ($request,$carbon,$setting_coaching_duration_time)
                    {
                        $q->orwherebetween('start_time',[$request->start_time ,$carbon->addMinutes($setting_coaching_duration_time)->format('H:i')])
                            ->orwherebetween('start_time',[$carbon->subMinutes(($setting_coaching_duration_time+5))->format('H:i'),$request->start_time])
                            ->orwherebetween('end_time',[$carbon->format('H:i'),$carbon->addMinutes($setting_coaching_duration_time+5)->format('H:i')]);

                    })
                    ->get();

                if($check->count()>0)
                {
                    $msg="تاریخ ".$date." در ساعت ".$request->start_time." با ".$check->count()."جلسه دیگر دارای تداخل می باشد.لطفا تاریخ ها را مجدد تنظیم کنید";
                    alert()->error($msg,'خطا')->persistent('بستن');
                    return back();
                }
                else
                {
                    foreach ($dates as $date)
                    {

                        $carbon = new Carbon($date." ".$request->start_time);
                        $carbon->addMinutes($setting_coaching_duration_time);

                        $status=Auth::user()->coach->bookings()->create(
                            [
                                'start_date'        =>$date,
                                'start_time'        =>$request->start_time,
                                'end_date'          =>$carbon->format('Y/m/d'),
                                'end_time'          =>$carbon->format('H:i'),
                                'date_fa'           =>JalaliDate::get_jalaliNow(),
                                'time_fa'           =>JalaliDate::get_timeNow(),
                            ]);
                        if($status)
                        {
                            alert()->success("اطلاعات با موفقیت ثبت شد",'پیام')->persistent('بستن');

                        }
                        else
                        {
                            alert()->error("خطا در ثبت اطلاعات رزرو",'خطا')->persistent('بستن');
                            return back();
                        }
                    }
                    return back();
                }
            }
        }


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('clinic::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('clinic::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Booking $booking)
    {
        if(Auth::user()->coach->id==$booking->coach_id)
        {
            if(($booking->start_date>\App\Services\JalaliDate::get_jalaliNow())&&(($booking->status)==0))
            {
                $status=$booking->delete();
                if($status)
                {
                    alert()->success('تاریخ مورد نظر با موفقیت حذف شد');
                }
                else
                {
                    alert()->error('خطا در حذف تاریخ مورد نظر');
                }
            }
            else
            {
                alert()->error('شما اجازه حذف این مورد را ندارید');
            }
        }
        else
        {
            alert()->error('شما دسترسی به این بخش ندارید');
        }

        return back();
    }

    public function statusAfterReserve(Booking $booking,Request $request)
    {
        $request->validate([
           'status' =>'required|in:10,11'
        ]);
        $reserve=($booking->reserves->where('status',0)->first());
        if($request->status==10)
        {
            $booking->status=10;
            $status=$booking->save();
            alert()->success('جلسه با موفقیت تائید شد');

        }
        elseif($request->status==11)
        {
            //رد شده
            $booking->status=0;
            $status=$booking->save();
            alert()->success('جلسه توسط شما رد شد');
        }

        $reserve->status=$request->status;
        $reserve->save();

        return back();

    }

    public function cancelCoach (Booking $booking)
    {
        if(Auth::user()->coach->id==$booking->coach_id)
        {
            $reserve=$booking->reserves->where('status',10)->first();
            $reserve->status=4;
            $reserve->save();
            $booking->status=0;
            $status=$booking->save();

            if($status)
            {
                alert()->success('جلسه با موفقیت لغو شد');
            }
            else
            {
                alert()->error('خطا در لغو جلسه');
            }
        }
        else
        {
            alert()->warning('شما مجاز به دسترسی به این بخش ندارید');
        }
        return back();
    }

    public function assignment(Booking $booking,Request $request)
    {
        $request->validate([
            'status' =>'required|in:2,3,4,5,6|'
        ]);
        $reserve=($booking->reserves->where('status',10)->first());
        $reserve->status=$request->status;
        $status=$reserve->save();
        $booking->status=$request->status;
        $booking->save();
        if($status)
        {
            alert()->success('جلسه تعیین تکلیف شد');
        }
        else
        {
            alert()->error('خطا در تعیین تکلیف جلسه');
        }

        return back();
    }


    public function reserves()
    {
        return view('clinic::user.coach.booking.reserves');
    }
}
