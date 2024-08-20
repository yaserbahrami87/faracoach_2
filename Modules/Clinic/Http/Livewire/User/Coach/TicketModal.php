<?php

namespace Modules\Clinic\Http\Livewire\User\Coach;

use App\Services\JalaliDate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\RequestPortal\Entities\RequestPortal;
use Modules\Ticket\Entities\Ticket;

class TicketModal extends ModalComponent
{
    public $User;
    public $RequestPortal;
    public $comment;

    protected function rules()
    {
        return[
            'comment'   =>'required|max:250',
        ];
    }

    public function mount(User $User,RequestPortal $RequestPortal)
    {
        $this->User=$User;
        $this->RequestPortal=$RequestPortal;
    }

    public function render()
    {
        return view('clinic::livewire.user.coach.ticket-modal');
    }


    public function sendTicket()
    {

        $this->validate();
        $ticket=Ticket::create(
            [
                'user_id_send'      =>Auth::user()->id,
                'subject'           =>$this->RequestPortal->description,
                'comment'           =>$this->comment,

                'date_fa'           =>JalaliDate::get_jalaliNow(),
                'time_fa'           =>JalaliDate::get_timeNow(),
                'type'              =>'coach',
                'post_id'           =>$this->RequestPortal->id
            ]);

        $this->comment=NULL;
        $this->emit('render_category');

        if(!is_null($ticket))
        {
            $this->emit('toast','success','پیام با موفقیت ارسال شد');
        }
        else
        {
            $this->emit('toast','error','خطا در ارسال پیام');
        }
    }
}
