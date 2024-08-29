<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;


use App\Services\JalaliDate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Crm\Entities\CategoryGettingKnow;
use Modules\Crm\Entities\City;
use Modules\Crm\Entities\Followup;
use Modules\Crm\Entities\Setting;
use Modules\Crm\Entities\State;
use App\User;
use Modules\Crm\Entities\UserType;

class Profile extends Component
{
    use WithFileUploads;
    public $user;
    public $tabChange;
    public $states;
    public $cities=[];
    public $fileName;
    public $gettingKnow;
    public $introduced;
    public $checkIntroduced;
    public $gettingKnow_children;
    public $datebirth;
    public $tab;


    protected function rules()
    {
        return[
            'user.fname'          =>'nullable|persian_alpha|max:200',
            'user.lname'          =>'nullable|persian_alpha|max:200',
            'user.personal_image' =>'nullable|image|max:1024',
            'user.shenasnameh_image' =>'nullable|image|max:1024',
            'user.education_image'=>'nullable|image|max:1024',
            'user.cartmelli_image'=>'nullable|image|max:1024',
            'user.resume'         =>'nullable|mimes:jpeg,jpg,pdf,png,bmp|max:1024',
            'user.sex'            =>'nullable|boolean',
            'user.codemelli'      =>'nullable|numeric|unique:users,codemelli,'.$this->user->id,
            'user.datebirth'      =>'nullable|date_format:Y/m/d|max:11',
            'user.shenasname'     =>'nullable|numeric',
            'user.username'       =>'nullable|string|unique:users,username'.$this->user->id,
            'user.tel'            =>'required|unique:users,tel,'.$this->user->id,
            'user.email'          =>'nullable|email|unique:users,email,'.$this->user->id,
            'user.state_id'       =>'nullable|numeric',
            'user.city_id'        =>'nullable|numeric',
            'user.address'        =>'nullable|string|max:200',
            'user.instagram'      =>'nullable|string|max:200|',
            'user.telegram'       =>'nullable|string|max:200|',
            'user.linkedin'       =>'nullable|string|max:200|',
            'user.father'         =>'nullable|persian_alpha|max:200|',
            'user.married'        =>'nullable|boolean',
            'user.born'           =>'nullable|string|max:200|',
            'user.education'      =>'nullable|in:دیپلم,فوق دیپلم,لیسانس,فوق لیسانس,دکتری و بالاتر,زیردیپلم|',
            'user.reshteh'        =>'nullable|string|',
            'user.job'            =>'nullable|string|',
            'user.gettingknow'    =>'nullable|numeric',
            'user.introduced'     =>'nullable|numeric',
            'user.type'           =>'nullable|numeric',
            'introduced'          =>'nullable|numeric',
        ];
    }

    public function mount(User $User)
    {

        $this->user=$User;


        if(!is_null($this->user->gettingknow))
        {
            $this->gettingKnowParent=$this->user->categoryGettingKnow->categoryGettingKnow_parent->id;
        }
        else
        {

            $this->gettingKnowParent=NULL;
        }

        if(!is_null($this->user->introduced))
        {
            $this->introduced=($this->user->get_introduced)->tel;
        }
    }


    public function render()
    {

        $this->states=State::get();

        if(!is_null($this->user->state_id))
        {
            $this->cities=City::where('state_id',$this->user->state_id)
                ->get();
        }

        if(!is_null($this->gettingKnowParent))
        {
            $this->gettingKnow_children=CategoryGettingKnow::where('parent_id',$this->gettingKnowParent)
                ->get();
        }

        $this->gettingKnowList=CategoryGettingKnow::where('status',1)
            ->where('parent_id',0)
            ->where('status',1)
            ->get();



        $this->dispatchBrowserEvent('plugins');

        return view('crm::livewire.admin.users.profile')
            ->layout('masterView::admin.master.index');
    }

    public function updatedUserFname()
    {
        $this->tabChange('profile');
        $this->validateOnly('User.fname');

    }

    public function updatedUserLname()
    {
        $this->tabChange('profile');
        $this->validateOnly('User.lname');
    }

    public function updatedUserPersonalImage()
    {

        $this->tabChange('profile');
        $this->validateOnly('user.personal_image');
        $this->user->personal_image=$this->handleUploadImage();
    }

    public function handleUploadImage()
    {

        $this->fileName="personal_".$this->user->id."_".time().".".$this->user->personal_image->extension();
        $this->user->personal_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserShenasnamehImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.shenasnameh_image');
        $this->user->shenasnameh_image=$this->handleUploadShenasnameh();
    }

    public function handleUploadShenasnameh()
    {
        $this->fileName="shenasnameh_".$this->user->id."_".time().".".$this->user->shenasnameh_image->extension();
        $this->user->shenasnameh_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserEducationImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.education_image');
        $this->user->education_image=$this->handleUploadEducation();
    }

    public function handleUploadEducation()
    {
        $this->fileName="education_".$this->user->id."_".time().".".$this->user->education_image->extension();
        $this->user->education_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserCartmelliImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.cartmelli_image');
        $this->user->cartmelli_image=$this->handleUploadCartmelli();
    }

    public function handleUploadCartmelli()
    {
        $this->fileName="cartmelli_image_".$this->user->id."_".time().".".$this->user->cartmelli_image->extension();
        $this->user->cartmelli_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserResume()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.resume');
        $this->user->resume=$this->handleUploadresume();
    }

    public function handleUploadResume()
    {
        $this->fileName="resume_".$this->user->id."_".time().".".$this->user->resume->extension();
        $this->user->resume->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }


    public function updatedUserSex()
    {
        $this->tabChange('profile');
        $this->validateOnly('user.sex');
    }

    public function updatedUserCodemelli ()
    {
        $this->tabChange('profile');
        $this->validateOnly('user.codemelli');
    }

    public function updatedUserShenasname ()
    {
        $this->tabChange('profile');
        $this->validateOnly('user.shenasname');
    }

    public function updatedUserDatebirth()
    {

        $this->tabChange('profile');
        $this->validateOnly('user.datebirth');
    }

    public function updatedUserTel()
    {
        $this->user->tel=(ltrim($this->user->tel, '0'));
        $this->tabChange('infoContact');
        $this->validateOnly('user.tel');
    }

    public function updatedUserEmail()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.email');
    }

    public function updatedUserStateId()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.state_id');
    }

    public function updatedUserCityId()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.city_id');
    }

    public function updatedUserAddress()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.address');
    }

    public function updatedUserInstagram()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.instagram');
    }

    public function updatedUserTelegram()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.telegram');
    }

    public function updatedUserLinkedin()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('user.linkedin');
    }


    public function updatedUserFather()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.father');
    }

    public function updatedUserBorn()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.born');
    }

    public function updatedUserEducation()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.education');
    }

    public function updatedUserReshteh()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('user.reshteh');
    }

    public function updatedGettingKnowParent()
    {
        $this->tabChange('infogettingKnow');
        $this->gettingKnow_children= CategoryGettingKnow::where('parent_id',$this->gettingKnowParent)
            ->get();
    }

    public function UpdatedIntroduced($name)
    {

        $this->tabChange('infogettingKnow');
        $this->introduced=(ltrim($this->introduced, '0'));
        $this->validateOnly('introduced');

        $this->checkIntroduced=User::where('tel',$this->introduced)
            ->first();

        if(!is_null($this->checkIntroduced))
        {
            $this->user->introduced=$this->checkIntroduced->id;
            //$this->user->save();
        }
        else
        {
            $this->user->introduced=NULL;
        }


    }


    public function save()
    {

        $this->validate([
            'user.fname'          =>'nullable|persian_alpha|max:200',
            'user.lname'          =>'nullable|persian_alpha|max:200',
            'user.sex'            =>'nullable|boolean',
            'user.codemelli'      =>'nullable|numeric|unique:users,codemelli,'.$this->user->id,
            'user.shenasname'     =>'nullable|numeric',
            'user.datebirth'      =>'nullable|string',
            'user.personal_image' =>'nullable|string|max:200',
            'user.username'       =>'nullable|string|unique:users,username,'.$this->user->id,
            'user.tel'            =>'required|unique:users,tel,'.$this->user->id,
            'user.email'          =>'nullable|email|unique:users,email,'.$this->user->id,
            'user.state_id'       =>'nullable|numeric',
            'user.city_id'        =>'nullable|numeric',
            'user.address'        =>'nullable|string|max:200',
            'user.instagram'      =>'nullable|string|max:200|',
            'user.telegram'       =>'nullable|string|max:200|',
            'user.linkedin'       =>'nullable|string|max:200|',
            'user.father'         =>'nullable|persian_alpha|max:200|',
            'user.married'        =>'nullable|boolean',
            'user.born'           =>'nullable|string|max:200|',
            'user.education'      =>'nullable|in:دیپلم,فوق دیپلم,لیسانس,فوق لیسانس,دکتری و بالاتر,زیردیپلم|',
            'user.reshteh'        =>'nullable|string|',
            'user.job'            =>'nullable|string|',
            'user.gettingknow'    =>'nullable|numeric|',
            'user.shenasnameh_image' =>'nullable|string|max:200',
            'user.cartmelli_image' =>'nullable|string|max:200',
            'user.education_image' =>'nullable|string|max:200',
            'user.resume'          =>'nullable|string|max:200',
        ]);

        $this->user->save();

        $this->emit('toast','success','اطلاعات با موفقیت بروزرسانی شد');
        return redirect(route('admin.user.profile',$this->user->id));
    }

    public function tabChange($tab)
    {
        $this->tabChange=$tab;
    }

    public function showFollowings($name)
    {
        $this->tab=$name;
        if($this->tab=='followings')
        {
            $this->emit('showFollowings',true);
        }
        elseif($this->tab=='invitation')
        {
            $this->emit('showInvitations',true);
        }

    }

    public function changeType()
    {

        $this->validateOnly('user.type');
        $this->user->followby_expert=NULL;
        $status=$this->user->save();
        $this->user=User::where('id',$this->user->id)
                            ->first();

        if($status)
        {
            Followup::create([
                'user_id'               =>$this->user->id,
                'insert_user_id'        =>Auth::user()->id,
                'date_fa'               =>JalaliDate::get_jalaliNow(),
                'time_fa'               =>JalaliDate::get_timeNow(),
                'comment'               =>" کاربر ارجاع داده شد به بخش ".$this->user->userType->type,
                'status_followups'      =>$this->user->type,
                'datetime_fa'           =>JalaliDate::get_timeNow()." ".JalaliDate::get_timeNow(),
            ]);
            $this->emit('toast','success','تغییر دسترسی با موفقیت انجام شد');
        }
        else
        {
            $this->emit('toast','danger','خطا در تغییر دسترسی');
        }


    }




}
