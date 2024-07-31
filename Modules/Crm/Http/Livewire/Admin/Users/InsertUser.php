<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Crm\Entities\Setting;

class InsertUser extends Component
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
    public $password="1234";
    public $password_confirmation="1234";
    public $send_sms;

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
            'email'                     =>'nullable|email|unique:users,email',
            'selectedGettingKnowChild'  =>'nullable|numeric',
            'type'                      =>'required|in:1,30,-1',
            'password'                  =>'required|string|confirmed',
            'send_sms'                  =>'nullable|max:200',
        ];
    }


    public function render()
    {
        $this->sms=Setting::where('setting','sms_insertUser')
                                ->get();

        foreach ($this->sms as $item)
        {
            if(is_null($this->sex))
            {
                $item->value=str_replace('{sex}','',$item->value);
            }
            elseif($this->sex==1)
            {
                $item->value=str_replace('{sex}','آقای',$item->value);
            }
            elseif($this->sex==0)
            {
                $item->value=str_replace('{sex}','خانم',$item->value);
            }

            $item->value=str_replace('{fname}',$this->fname,$item->value);
            $item->value=str_replace('{lname}',$this->lname,$item->value);
            $item->value=str_replace('{followby_expert}',Auth::user()->fname.' '.Auth::user()->lname,$item->value);
            $item->value=str_replace('{admin_tel}',Auth::user()->tel,$item->value);
            $item->value=str_replace('{telegram}',Auth::user()->telegram,$item->value);
//            $item->value=str_replace('{datebirth}',$this->datebirth ,$item->value);
            $item->value=str_replace('{tel}',$this->tel ,$item->value);
            //$item->value=str_replace('{nextDate}',$this->followup->nextfollowup_date_fa ,$item->value);

        }


        return view('crm::livewire.admin.users.insert-user')
                        ->layout('masterView::admin.master.index');
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
            'insert_user_id'=>Auth::user()->id,
        ]);


        alert()->success('ثبت نام با موفقیت انجام شد')->persistent('بستن');
        $this->emit('toast','success','ثبت نام با موفقیت انجام شد');
        return redirect()->route('admin.user.insert');
    }

    public function updated($name)
    {
        $this->tel=(ltrim($this->tel, '0'));
        $this->validateOnly($name);
    }
}
