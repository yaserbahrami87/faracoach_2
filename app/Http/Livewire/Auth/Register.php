<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Crm\Entities\CategoryGettingKnow;

class Register extends Component
{
    public $fname;
    public $lname;
    public $sex;
    public $tel;
    public $email;
    public $type;
    public $gettingknow=[];
    public $selectedGettingKnowChild;
    public $user;
    public $validate;
    public $password;
    public $password_confirmation;


    public function mount()
    {
        $this->user=new User();
    }

    protected function rules()
    {
        return [
            'fname'                     =>'required|persian_alpha|min:3|max:100',
            'lname'                     =>'required|persian_alpha|max:100|min:3',
            'sex'                       =>'required|boolean',
            'tel'                       =>'required|min:9|unique:users,tel',
            'email'                     =>'required|email|unique:users,email',
            'selectedGettingKnowChild'  =>'nullable|numeric',
            'type'                      =>'required|in:1,30',
            'password'                  =>'required|string|min:8|confirmed',
        ];
    }

    public function render()
    {
        $this->gettingknow=CategoryGettingKnow::whereNull('parent_id')
                                ->get();
        $this->dispatchBrowserEvent('plugins');
        return view('livewire.auth.register');
    }

    public function register()
    {

        $this->validate();
        $this->user->create([
            'fname'  =>$this->fname,
            'lname'  =>$this->lname,
            'sex'    =>$this->sex,
            'tel'    =>$this->tel,
            'email'  =>$this->email,
            'type'   =>$this->type,
            'password' => Hash::make($this->password),
        ]);

        alert()->success('ثبت نام شما با موفقیت انجام شد')->persistent('بستن');
        return redirect('/');
    }

    public function updated($name)
    {

        $this->tel=(ltrim($this->tel, '0'));
        $this->validateOnly($name);

    }

    public function getTelsProperty()
    {
//        return $this->tel."asd";

    }


}
