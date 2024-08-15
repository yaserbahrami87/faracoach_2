<?php

namespace Modules\Event\Http\Livewire\Admin\Organizers;

use App\User;
use Livewire\Component;
use Modules\Event\Entities\EventOrganizer;

class Organizers extends Component
{
    public $organizer;
    public $q;
    public $result;
    public $user_id;
    public $organizers;

    protected function rules()
    {
        return [
            'q' =>'required|min:3',
            'organizer'    =>'required|numeric|unique:event_organizers,user_id'
        ];
    }

    public function mount(EventOrganizer $organizer)
    {
        $this->organizer=$organizer;
        $this->organizers=EventOrganizer::orderby('id','desc')
                                ->get();
    }

    public function render()
    {

        $this->organizers=EventOrganizer::orderby('id','desc')
                                ->get();
        return view('event::livewire.admin.organizers.organizers')
                            ->layout('masterView::admin.master.index');
    }

    public function updatedQ()
    {
        $this->validateOnly('q');
        $this->result=User::orwhere('tel','like',"%".$this->q."%")
                            ->orwhere('fname','like',"%".$this->q."%")
                            ->orwhere('lname','like',"%".$this->q."%")
                            ->get();

    }

    public function insert()
    {
        $this->validate([
                'organizer' =>'required|numeric|unique:event_organizers,user_id'
            ]);

        $status=EventOrganizer::create([
                'user_id'   =>$this->organizer,
        ]);
        if($status)
        {
            $this->emit('toast','success','برگزار کننده با موفقیت اضافه شد');
        }
        else
        {
            $this->emit('toast','danger','خطا در افزودن برگزارکننده');
        }

    }

    public function destroy(EventOrganizer $organizer)
    {
            $status=$organizer->delete();
            if($status)
            {
                $this->emit('toast','success','برگزار کننده با موفقیت حذف شد');
            }
            else
            {
                $this->emit('toast','danger','خطا در حذف برگزارکننده');
            }
    }

    public function changeStatus(EventOrganizer $eventOrganizer)
    {

        if($eventOrganizer->status==1)
        {
            $eventOrganizer->status=0;
            $this->emit('toast','success','برگزارکننده '.$eventOrganizer->user->fname.' '.$eventOrganizer->user->lname  .' غیرفعال شد');
        }
        else
        {
            $eventOrganizer->status=1;
            $this->emit('toast','success','برگزارکننده '.$eventOrganizer->user->fname.' '.$eventOrganizer->user->lname.' فعال شد');
        }

        $eventOrganizer->save();
    }

}
