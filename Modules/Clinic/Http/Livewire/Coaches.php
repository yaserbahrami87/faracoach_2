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
    public $clinicCategoriesChildren=[];
    public $clinicCategory_select=[];
    public $coachCategory_select=[];
    public $sex_select=[];
    public $q;

    protected function rules()
    {
        return [
            'q'   =>'required|min:3',
            ];
    }

    public function mount()
    {
        $this->clinicCategories=ClinicCategory::whereNull('parent_id')
            ->get();

        $this->coaches=Coach::where('status',2)
            ->get();
    }
    public function render()
    {
        $this->coachCategories= CoachCategory::get();


        return view('clinic::livewire.coaches')
                    ->layout('master.index');
    }

    public function updatedClinicCategorySelect()
    {
        $this->clinicCategoriesChildren=ClinicCategory::whereIn('parent_id',$this->clinicCategory_select)
                            ->get();

        $this->filters();


    }

    public function updatedCoachCategorySelect()
    {
        $this->filters();

    }

    public function updatedSexSelect()
    {
        $this->filters();
    }

    public function filters()
    {
        $this->coaches=Coach::when($this->clinicCategory_select!=[],function ($query)
        {
            $query->with('cliniccategories')
            ->whereHas('cliniccategories', function($query)
            {
                $query->whereIn('cliniccategory_id',$this->clinicCategory_select);
            });
        })
        ->when($this->coachCategory_select!=[],function ($query)
        {
            $query->with('coachcategories')
            ->whereHas('coachcategories',function($query)
            {
                $query->whereIn('coachcategory_id',$this->coachCategory_select);
            });
        })
        ->when($this->sex_select!=[],function ($query)
        {
            $query->with('user')
                ->whereHas('user',function($query)
                {
                    $query->whereIn('sex',$this->sex_select);
                });
        })
        ->where('status',2)
        ->get();
    }

    public function clearFilters()
    {
        $this->coaches=Coach::where('status',2)
            ->get();

        $this->clinicCategories=ClinicCategory::whereNull('parent_id')
            ->get();
        $this->clinicCategoriesChildren=[];
        $this->clinicCategory_select=[];
        $this->coachCategory_select=[];
        $this->sex_select=[];
    }

    public function updatedQ()
    {
        $this->validateOnly('q');
        $this->coaches=Coach::when(!is_null($this->q),function ($query)
        {
            $query->with('user')
            ->whereHas('user',function($query)
            {
                $query->where('fname','like','%'.$this->q.'%')
                    ->orwhere('lname','like','%'.$this->q.'%');
            });
        })
        ->get();


    }
}
