<?php

namespace Modules\Clinic\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\Coach;
use Modules\Clinic\Entities\CoachType;
use Modules\RequestPortal\Entities\RequestPortal;

class CoachRequestModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '2xl';
    }

    public $coach;
    public $coachTypes;

    public function mount(User $User)
    {

        $this->coach=$User->coach;
        //    $this->requestPortal=$item;

    }

    public function render()
    {
        $this->coachTypes=CoachType::get();
        return view('clinic::livewire.admin.coach-request-modal');
    }
}
