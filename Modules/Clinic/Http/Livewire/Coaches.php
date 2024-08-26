<?php

namespace Modules\Clinic\Http\Livewire;

use Livewire\Component;
use Modules\Clinic\Entities\ClinicCategory;
use Modules\Clinic\Entities\Coach;
use Modules\Clinic\Entities\CoachCategory;

class Coaches extends Component
{
    public $coachCategories;
    public $coaches;
    public $clinicCategories;
    public $clinicCategory_select=[];
    public function render()
    {
        $this->coachCategories= CoachCategory::get();
        $this->coaches=Coach::where('status',2)
                        ->get();
        $this->clinicCategories=ClinicCategory::whereNull('parent_id')
                                    ->get();
        return view('clinic::livewire.coaches')
                    ->layout('master.index');
    }

    public function updatedClinicCategorySelect()
    {
        $this->coaches=Coach::whereHas('user', function($query)
        {
            $query->where('sex',1);
        })
        ->whereHas('cliniccategories', function($query)
        {
            dd($query);

        })

        ->get();

        dd($this->coaches);
    }
}
