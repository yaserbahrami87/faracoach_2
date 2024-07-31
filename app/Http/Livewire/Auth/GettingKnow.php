<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Livewire\Component;
use Modules\Crm\Entities\CategoryGettingKnow;

class GettingKnow extends Component
{
    public $gettingknow;
    public $selectedGettingKnow;
    public $selectedGettingKnowChild;
    public $introduced;
    public $introducedUser;
    public $gettingknowChild;

    public $test=[
        'selectedGettingKnowChild'=>NULL,
    ];
    protected $rules=[
        'gettingknow'        =>'required|numeric',
        'gettingknowChild'   =>'required|numeric',
        'introduced'         =>'required|min:10',
    ];

    public function mount()
    {
        $this->gettingknow=CategoryGettingKnow::where('parent_id',0)
                            ->where('status',1)
                            ->get();

    }

    public function render()
    {

        $this->dispatchBrowserEvent('plugins_introduced');
        return view('livewire.auth.getting-know');
    }

    public function updatedSelectedGettingKnow($name)
    {
        $this->validateOnly($name);
        $this->selectedGettingKnowChild=NULL;
        $this->gettingknowChild=CategoryGettingKnow::where('parent_id',$this->selectedGettingKnow)
                                    ->where('status',1)
                                    ->get();
    }

    public function updated($name)
    {

        $this->validateOnly($name);

    }

    public function updatedIntroduced($name)
    {
        $this->introduced=(ltrim($this->introduced, '0'));
        $this->validateOnly($name);
        $this->introducedUser=User::where('tel','like',"%$this->introduced%")
                                    ->first();


    }





}
