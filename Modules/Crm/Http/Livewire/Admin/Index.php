<?php

namespace Modules\Crm\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Crm\Entities\User;

class Index extends Component
{
    public $users;
    public function render()
    {
        $this->users=User::get();
        return view('crm::livewire.admin.index');
    }
}
