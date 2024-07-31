<?php

namespace Modules\Event\Http\Livewire\Admin\Events;

use Livewire\Component;
use Modules\Event\Entities\Event;

class Events extends Component
{
    public $events;
    public $status;
    public $event_tmp=[];

    protected function rules()
    {
        return [
            'events.status' =>'required|boolean',
        ];
    }

    public function mount()
    {

    }
    public function render()
    {
        $this->events=Event::orderby('id','desc')
            ->get();
        return view('event::livewire.admin.events.events')
                    ->layout('masterView::admin.master.index');
    }

    public function updatedEventStatus()
    {
        dd($this->events);
    }

    public function changeStatus(Event $Event)
    {

        if($Event->status==1)
        {
            $Event->status=0;
            $this->emit('toast','success','رویداد '.$Event->event.' غیرفعال شد');
        }
        else
        {
            $Event->status=1;
            $this->emit('toast','success','رویداد '.$Event->event.' فعال شد');
        }

        $Event->save();
    }
}
