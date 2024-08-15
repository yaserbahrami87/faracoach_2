<?php

namespace Modules\Event\Http\Livewire\Admin\Participants;

use App\Problemfollowup;
use App\User;
use Livewire\Component;
use Modules\Event\Entities\Event;
use Modules\Event\Entities\EventParticipants;

class ParticipantInsert extends Component
{
    public $event;
    public $q;
    public $users=[];
    public $user;
    public $date_fa;
    public $time_fa;

    protected function rules()
    {
        return[
            'q'         =>'required|max:50|min:3',
            'user'      =>'required|numeric',
            'date_fa'   =>'required|date_format:Y/m/d|max:11',
            'time_fa'   =>'required|date_format:H:i|max:5',
        ];
    }

    public function mount(Event $event)
    {
        $this->event=$event;

    }
    public function render()
    {
        $this->dispatchBrowserEvent('plugins');
        return view('event::livewire.admin.participants.participant-insert')
                ->layout('masterView::admin.master.index');
    }

    public function updatedQ()
    {
        if(strlen($this->q)>0)
        {
            $this->users=User::orwhere('fname','like','%'.$this->q.'%')
                    ->orwhere('lname','like','%'.$this->q.'%')
                    ->orwhere('tel','like','%'.$this->q.'%')
                    ->get();

        }
    }

    public function updatedDateFa()
    {
        $this->validateOnly('date_fa');
    }

    public function updatedTimeFa()
    {
        $this->validateOnly('time_fa');
    }

    public function addparticipant()
    {

        $this->validate();
        $check=EventParticipants::where('user_id',$this->user)
                            ->where('event_id',$this->event->id)
                            ->get();

        if($check->count()==0)
        {
            $status=EventParticipants::create([
                'user_id'   =>$this->user,
                'event_id'  =>$this->event->id,
                'date_fa'   =>$this->date_fa,
                'time_fa'   =>$this->time_fa,
            ]);
            if($status)
            {
                alert()->success('کاربر با موفقیت به رویداد اضافه شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در اضافه کردن کاربر به رویداد')->persistent('بستن');
            }

            return redirect()->route('admin.event.all');
        }
        else
        {
            $this->emit('toast','error','این دانشجو در رویداد مورد نظر وجود دارد');
        }

    }
}
