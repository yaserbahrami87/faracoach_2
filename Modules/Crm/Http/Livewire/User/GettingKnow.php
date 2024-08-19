<?php

namespace Modules\Crm\Http\Livewire\User;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Crm\Entities\CategoryGettingKnow;

class GettingKnow extends Component
{
    public $gettingKnow_parents;
    public $gettingKnow_parent;
    public $gettingknow;
    public $parent_id;
    public $gettingknows=[];
    public $introduced;
    public $introduced_info;

    public function mount()
    {
        $this->gettingknow=Auth::user()->gettingknow;
        $this->introduced=Auth::user()->introduced;
        if(!is_null($this->gettingknow))
        {
            $this->parent_id=CategoryGettingKnow::where('id',$this->gettingknow)
                                            ->first();

            $this->parent_id=$this->parent_id->parent_id;

            $this->gettingknows=CategoryGettingKnow::where('parent_id',$this->parent_id)
                                                        ->get();

            $this->gettingKnow_parent=CategoryGettingKnow::where('id',$this->parent_id)
                                        ->first();
            $this->gettingKnow_parent=$this->gettingKnow_parent->id;

        }
    }

    public function render()
    {
        if(!is_null($this->introduced))
        {
            $this->introduced_info=User::where('id',$this->introduced)
                                        ->first();
        }

        $this->gettingKnow_parents=CategoryGettingKnow::where('parent_id',0)
                                            ->get();

        return view('crm::livewire.user.getting-know');
    }

    public function updatedGettingKnowParent()
    {

        $this->gettingknows=CategoryGettingKnow::where('parent_id',$this->gettingKnow_parent)
                                ->get();
    }

    public function updatedIntroduced()
    {
        $this->introduced=(ltrim($this->introduced, '0'));
        $this->introduced_info=User::where('tel',$this->introduced)
                                                        ->first();
    }

    public function updateProfile()
    {

        Auth::user()->gettingknow=$this->gettingknow;

        if(!is_null($this->introduced_info))
        {
            Auth::user()->introduced=$this->introduced_info->id;
        }
        $status=Auth::user()->save();
        if($status)
        {
            $this->emit('toast','success','پروفایل با موفقیت بروزرسانی شد');
        }
        else
        {
            $this->emit('toast','error','خطا در بروزرسانی');
        }

    }
}
