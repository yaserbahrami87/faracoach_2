<?php

namespace Modules\Clinic\Http\Livewire\User\Coach;

use App\Providers\JalaliDateServiceProvider;
use App\Services\JalaliDate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClinicCategory extends Component
{
    public $clinicCategory;
    public $requestPortals=[];
    public $services;
    public $service;
    public $expertises;
    public $expertise;
    public $tendencies;
    public $tendency;

    protected $listeners=[
        'render_category'=>'render',
    ];

    protected function rules()
    {
        return
        [
            'expertise'     =>'required|numeric',
            'tendencies'    =>'required|array',
            'service'       =>'required|numeric',
            'expertise'      =>'required|numeric',
            'tendency'      =>'required|numeric',
        ];
    }

    public function render()
    {


        $this->requestPortals=Auth::user()->request_portals->where('type','coach');

        $this->clinicCategories=\Modules\Clinic\Entities\ClinicCategory::get();
        $this->dispatchBrowserEvent('plugins');
        return view('clinic::livewire.user.coach.clinic-category');
    }

    public function updatedService()
    {
        $this->validateOnly('service');
        $this->expertises=\Modules\Clinic\Entities\ClinicCategory::where('parent_id',$this->service)
                                                                        ->get();
        $this->tendencies=[];
        //$this->expertises=\Modules\Clinic\Entities\ClinicCategory::
    }

    public function updatedExpertise()
    {
        $this->validateOnly('expertise');
        $this->tendencies=\Modules\Clinic\Entities\ClinicCategory::where('parent_id',$this->expertise)
                                        ->get();
    }

    public function register()
    {

        $this->validate();
        if(is_null(Auth::user()->coach->cliniccategories->where('id',$this->tendency)->first()) )
        {
            $tmp=\Modules\Clinic\Entities\ClinicCategory::where('id',$this->tendency)
                                                ->first();

            Auth::user()->request_portals()->create([
                'type'          =>'coach',
                'description'   =>'درخواست خدمات '.$tmp->title,
                'date_fa'       =>JalaliDate::get_jalaliNow(),
                'time_fa'       =>JalaliDate::get_timeNow(),
            ]);

            Auth::user()->coach->cliniccategories()->attach([$this->tendency]);


            $this->emit('toast','success','درخواست خدمت با موفقیت ثبت شد');
            $this->expertise=NULL;
            $this->expertises=NULL;
            $this->tendency=NULL;
            $this->tendencies=NULL;
            $this->service=NULL;
            $this->emit('render_category');


        }
        else
        {
            $this->emit('toast','error','این نوع خدمت تکراری است');
        }

    }
}
