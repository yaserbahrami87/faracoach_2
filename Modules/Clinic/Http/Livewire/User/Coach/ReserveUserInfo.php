<?php

namespace Modules\Clinic\Http\Livewire\User\Coach;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\Reserve;

class ReserveUserInfo extends ModalComponent
{
    public $reserve;
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
        return 'md';
    }

    public function mount(Reserve $Reserve)
    {

        $this->reserve=$Reserve;
    }

    public function render()
    {
        return view('clinic::livewire.user.coach.reserve-user-info');
    }
}
