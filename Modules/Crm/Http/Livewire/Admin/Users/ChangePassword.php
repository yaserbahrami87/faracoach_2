<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Crm\Entities\User;

class ChangePassword extends ModalComponent
{

    public $user;
    public $password;
    public $password_confirmation;
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

    protected function rules()
    {
        return[
            'password' =>'required|min:8|confirmed'
        ];
    }


    public function mount(User $user)
    {
        $this->user=$user;
    }
    public function render()
    {
        return view('crm::livewire.admin.users.change-password');
    }

    public function changePassword()
    {
        $this->validate();
        $this->user->password=Hash::make($this->password);
        $status=$this->user->save();
        if($status)
        {
            $this->emit('toast','success','رمز کاربر با موفقیت تغییر کرد');
        }
        else
        {
            $this->emit('toast','error','خطا در تغییر رمز کاربر');
        }
    }
}
