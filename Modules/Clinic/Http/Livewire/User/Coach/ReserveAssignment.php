<?php

namespace Modules\Clinic\Http\Livewire\User\Coach;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\Booking;
use Modules\Clinic\Entities\Reserve;

class ReserveAssignment extends ModalComponent
{
    public $reserve;
    public $status;
    public $result;
    public $booking;

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return 'md';
    }

    protected function rules()
    {
        return[
            'status'            =>'required|in:2,3,4,5,6|',
            'result'            =>'required|max:200',
        ];
    }


    public function mount(Reserve $reserve)
    {
        $this->reserve=$reserve;
    }

    public function render()
    {
        return view('clinic::livewire.user.coach.reserve-assignment');
    }

    public function save()
    {

        $this->validate();
//        $this->reserve=($this->booking->reserves->where('status',10)->first());
        $this->booking=$this->reserve->booking;
        $this->reserve->status=$this->status;
        $this->reserve->result=$this->result;
        $status=$this->reserve->save();
        $this->booking->status=$this->status;
        $this->booking->save();
        if($status)
        {
            alert()->success('جلسه تعیین تکلیف شد');
        }
        else
        {
            alert()->error('خطا در تعیین تکلیف جلسه');
        }

        return  redirect()->route('user.clinic.booking.reserves');
    }
}
