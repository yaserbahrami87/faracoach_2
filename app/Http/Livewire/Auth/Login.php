<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules=[
        'email'     =>'required|min:9',
        'password'  =>'required|string|min:8',
    ];

    public function render()
    {
        //$this->dispatchBrowserEvent('plugins');
        return view('livewire.auth.login');
    }

    public function updated($name)
    {

        $this->validateOnly($name);
    }

    public function login()
    {
        $this->email=(ltrim($this->email, '0'));
        $this->validate();

        $user=User::where('tel',$this->email)
                    ->where('password',Hash::check('INPUT PASSWORD',$this->password))
                    ->first();
        if(is_null($user))
        {

            $this->emit('toast','error','اطلاعات وارد شده صحیح نمی باشد');
//            $this->dispatchBrowserEvent('toast',[
//                    'type'      =>'error',
//                    'message'   =>'اطلاعات وارد شده صحیح نمی باشد'
//            ]);
        }
        else
        {
            Auth::loginUsingId($user->id);
            $this->emit('toast','success','با موفقیت وارد شدید');
            return redirect('/');
        }
    }
}


