<?php

namespace Modules\Crm\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Crm\Entities\City;
use Modules\Crm\Entities\State;

class Location extends Component
{
    public $states;
    public $cities=[];
    public $state;
    public $city;

    public function mount()
    {
        $this->state=Auth::user()->state_id;
        $this->city=Auth::user()->city_id;
    }

    public function render()
    {
        $this->states=State::get();
        if(!is_null($this->state))
        {
            $this->cities=City::where('state_id',$this->state)
                                ->get();
        }
        return view('crm::livewire.user.location');
    }
}
