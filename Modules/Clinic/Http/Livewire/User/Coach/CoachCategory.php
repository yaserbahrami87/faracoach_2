<?php

namespace Modules\Clinic\Http\Livewire\User\Coach;

use Livewire\Component;

class CoachCategory extends Component
{
    public $coachCategories;
    public function render()
    {
        $this->coachCategories=\Modules\Clinic\Entities\CoachCategory::get();
        return view('clinic::livewire.user.coach.coach-category');
    }
}
