<?php

namespace Modules\Clinic\Http\Livewire\Admin\Coach;

use Livewire\Component;
use Modules\Clinic\Entities\CoachCategory;
use Modules\RequestPortal\Entities\RequestPortal;

class CoachReques extends Component
{
    public $coachRequests;
    public function render()
    {
        $this->coachRequests=RequestPortal::where('type','coach')
                            ->orderby('id','desc')
                            ->get();
        return view('clinic::livewire.admin.coach.coach-reques')
                        ->layout('masterView::admin.master.index');
    }
}
