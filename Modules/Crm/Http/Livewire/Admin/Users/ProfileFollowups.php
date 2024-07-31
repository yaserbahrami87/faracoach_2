<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use Livewire\Component;
use Modules\Crm\Entities\User;

class ProfileFollowups extends Component
{
    public $User;
    public $readyToLoad=false;
    protected $listeners=['showFollowings'];
    public function mount(User $user)
    {
        $this->User=$user;
    }

    public function render()
    {
        return view('crm::livewire.admin.users.profile-followups');
    }

//    public function loadFollowups()
//    {
//        $this->readyToLoad=true;
//    }

    public function showFollowings()
    {
        $this->readyToLoad=true;
    }
}
