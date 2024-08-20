<?php

namespace Modules\Clinic\Http\Livewire\Admin\Coach;

use Livewire\Component;
use Modules\Clinic\Entities\CoachCategory;
use Modules\RequestPortal\Entities\RequestPortal;

class CoachReques extends Component
{
    public $coachRequests;

    protected $listeners=[
        'tickets_coach_request_admin'=>'render',
    ];

    public function render()
    {
        $this->coachRequests=RequestPortal::wherein('type',['coach_request','coach_service_request'])
                            ->orderby('id','desc')
                            ->get();
        return view('clinic::livewire.admin.coach.coach-reques')
                        ->layout('masterView::admin.master.index');
    }

}
