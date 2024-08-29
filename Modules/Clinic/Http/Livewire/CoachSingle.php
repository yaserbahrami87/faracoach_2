<?php

namespace Modules\Clinic\Http\Livewire;

use App\Services\JalaliDate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Clinic\Entities\Booking;
use Modules\Clinic\Entities\ClinicCategory;
use Modules\Clinic\Entities\CoachSetting;

class CoachSingle extends Component
{
    public $user;
    public $dateShamsiSelected;
    public $dateShamsiSelectedwithDigit;
    public $bookings=[];
    public $bookings_search=[];
    public $timSelected;
    public $test;
    public $date;
    public $bookingTime;
    public $cliniccategory;
    public $clinicCategory_tmp;
    public $fi;
    public $off;
    public $coupon;
    public $type_discount;
    public $final_fi;

    public $subject,$description,$type_booking;

    protected function rules()
    {
        return [
            'subject'       =>'required|string|max:200',
            'description'   =>'nullable|max:200',
            'type_booking'  =>'required|between:0,2',
            'cliniccategory'=>'required|numeric',
        ];
    }


    public function mount($user)
    {
        $this->user=$user;
    }

    public function render()
    {
        $cliniccategories=ClinicCategory::whereNull('parent_id')
                        ->get();


        if($this->user->coach)
        {
            $this->dispatchBrowserEvent('plugins');
            return view('clinic::livewire.coach-single')
                ->layout('master.index');
        }
        else
        {
            alert()->error('خطا در پیدا کردن کوچ مورد نظر');
            return back();
        }
    }

    public function dateSelected($year,$month,$day)
    {
        if($month<10)
        {
            $month='0'.$month;
        }

        if($day<10)
        {
            $day='0'.$day;
        }

        $this->dateShamsiSelectedwithDigit=$year.'/'.$month.'/'.$day;

        $this->bookings=Booking::where('coach_id',$this->user->coach->id)
                                    ->where('start_date',$this->dateShamsiSelectedwithDigit)
                                    ->get();

    }

    public function updatedDate()
    {

        $this->bookings_search=Booking::where('coach_id',$this->user->coach->id)
            ->where('start_date',$this->date)
            ->where('status',0)
            ->get();

        $this->reserve=[];

    }

    public function save()
    {
        $this->validate();

        if(is_null($this->off))
        {
            $this->final_fi=$this->fi;
        }

        $status=Auth::user()->reserves()->create(
            [
                'booking_id'    =>$this->bookingTime,
                'subject'       =>$this->subject,
                'description'   =>$this->description,
                'type_booking'  =>$this->type_booking,
                'cliniccategory_id'=>$this->cliniccategory,
                'fi'            =>$this->fi,
                'coupon'        =>$this->coupon,
                'final_fi'      =>$this->final_fi,
                'off'           =>$this->off,
                'type_discount' =>$this->type_discount,
                'date_fa'       =>JalaliDate::get_jalaliNow(),
                'time_fa'       =>JalaliDate::get_timeNow(),

            ]
        );

        if($status)
        {
            $booking=Booking::where('id',$this->bookingTime)
                                    ->first();
            $booking->status=1;
            $booking->save();
            $this->emit('toast','success','جلسه با موفقیت به روزرسانی شد');
        }
        else
        {
            $this->emit('toast','error','خطا درثبت جلسه');
        }

        $this->bookings_search=[];
        $this->bookingTime=NULL;
        $this->subject=NULL;
        $this->description=NULL;
        $this->type_booking=NULL;
        $this->render();

    }

    public function UpdatedCliniccategory()
    {
        $this->validateOnly('cliniccategory');
        $this->clinicCategory_tmp=ClinicCategory::where('id',$this->cliniccategory)
                                    ->first();

        if($this->clinicCategory_tmp->parent_category->parent_category->title=="مشاوره")
        {
            $this->fi=$this->user->coach->coachSettings->where('setting','counseling_fi')->first()->value;
        }
        elseif($this->clinicCategory_tmp->parent_category->parent_category->title=="کوچینگ")
        {
            $this->fi=$this->user->coach->coachSettings->where('setting','coaching_fi')->first()->value;
        }
        elseif($this->clinicCategory_tmp->parent_category->parent_category->title=="خدمات")
        {
            $this->fi=$this->user->coach->coachSettings->where('setting','service_fi')->first()->value;
        }

    }

    public function checkCoupon()
    {

        $this->validate([
                'coupon'   =>'required|string|max:100'
            ]);

        //چک کردن کوپن
        $this->off=10;
        $this->type_discount="%";
        if($this->type_discount=='%')
        {
            $this->final_fi=($this->fi-(($this->fi*$this->off)/100));
        }
        else
        {
            $this->final_fi=($this->fi-$this->off);
        }

        $this->emit('toast','success' ,'کد تخفیف اعمال شد');
    }




}
