<?php

namespace Modules\Clinic\Http\Livewire\User;

use App\Services\JalaliDate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\Reserve;
use Modules\Comment\Entities\Comment;

class InsertComment extends ModalComponent
{
    public $reserve;
    public $comment;
    public $rate;

    protected function rules()
    {
        return[
                'comment'   =>'required|max:200',
                'rate'      =>'required|between:1,5'
            ];
    }


    public function mount(Reserve $reserve)
    {
        $this->reserve=$reserve;
    }
    public function render()
    {
        return view('clinic::livewire.user.insert-comment');
    }

    public function save()
    {
        $this->validate();
        $this->reserve->rate=$this->rate;
        $this->reserve->feedback=$this->comment;
        $status=$this->reserve->save();
        if($status)
        {
            alert()->success('بازخورد با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت بازخورد')->persistent('بستن');
        }

        return redirect()->route('user.clinic.reserves');

    }
}
