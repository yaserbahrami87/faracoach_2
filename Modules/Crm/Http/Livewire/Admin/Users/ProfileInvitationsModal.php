<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Crm\Entities\User;

class ProfileInvitationsModal extends ModalComponent
{
    public $User;
    public $readyToLoad=false;
    protected $listeners=['loadIntroduced'];

    public function mount(User $user)
    {
        $this->User=$user;
    }

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
        return '3xl';
    }



    public function render()
    {

        return view('crm::livewire.admin.users.profile-invitations-modal');
    }

    public function loadIntroduced()
    {
        //$this->readyToLoad=true;
    }
}
