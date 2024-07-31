<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use Livewire\Component;
use Modules\Crm\Entities\User;

class ProfileInvitations extends Component
{
    public $User;
    public $readyToLoad=false;
    protected $listeners=['showInvitations'];



    public function mount(User $user)
    {
        $this->User=$user;
    }

    public function render()
    {
        return view('crm::livewire.admin.users.profile-invitations');
    }

    public function showInvitations()
    {
        $this->readyToLoad=true;
    }

}
