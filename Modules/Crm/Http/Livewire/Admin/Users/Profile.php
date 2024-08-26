<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Crm\Entities\CategoryGettingKnow;
use Modules\Crm\Entities\City;
use Modules\Crm\Entities\Setting;
use Modules\Crm\Entities\State;
use Modules\Crm\Entities\User;

class Profile extends Component
{
    use WithFileUploads;
    public $User;
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
              'User.fname'          =>'nullable|persian_alpha|max:200',
              'User.lname'          =>'nullable|persian_alpha|max:200',
              'User.personal_image' =>'nullable|image|max:1024',
              'User.shenasnameh_image' =>'nullable|image|max:1024',
              'User.education_image'=>'nullable|image|max:1024',
              'User.cartmelli_image'=>'nullable|image|max:1024',
              'User.resume'         =>'nullable|mimes:jpeg,jpg,pdf,png,bmp|max:1024',
              'User.sex'            =>'nullable|boolean',
              'User.codemelli'      =>'nullable|numeric|unique:Users,codemelli,'.$this->User->id,
              'User.datebirth'      =>'nullable|date_format:Y/m/d|max:11',
              'User.shenasname'     =>'nullable|numeric',
              'User.username'       =>'nullable|string|unique:users,username'.$this->user->id,
              'User.tel'            =>'required|unique:users,tel,'.$this->User->id,
              'User.email'          =>'nullable|email|unique:users,email,'.$this->User->id,
              'User.state_id'       =>'nullable|numeric',
              'User.city_id'        =>'nullable|numeric',
              'User.address'        =>'nullable|string|max:200',
              'User.instagram'      =>'nullable|string|max:200|',
              'User.telegram'       =>'nullable|string|max:200|',
              'User.linkedin'       =>'nullable|string|max:200|',
              'User.father'         =>'nullable|persian_alpha|max:200|',
              'User.married'        =>'nullable|boolean',
              'User.born'           =>'nullable|string|max:200|',
              'User.education'      =>'nullable|in:دیپلم,فوق دیپلم,لیسانس,فوق لیسانس,دکتری و بالاتر,زیردیپلم|',
              'User.reshteh'        =>'nullable|string|',
              'User.job'            =>'nullable|string|',
              'User.gettingknow'    =>'nullable|numeric',
              'User.introduced'     =>'nullable|numeric',
              'introduced'          =>'nullable|numeric',
        ];
    }

    public function mount(User $User)
    {

        $this->User=$User;


        if(!is_null($this->User->gettingknow))
        {
            $this->gettingKnowParent=$this->User->categoryGettingKnow->categoryGettingKnow_parent->id;
        }
        else
        {

            $this->gettingKnowParent=NULL;
        }

        if(!is_null($this->User->introduced))
        {
            $this->introduced=($this->User->get_introduced)->tel;
        }
    }


    public function render()
    {

        $this->states=State::get();

        if(!is_null($this->User->state_id))
        {
            $this->cities=City::where('state_id',$this->User->state_id)
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
        $this->validateOnly('User.personal_image');
        $this->User->personal_image=$this->handleUploadImage();
    }

    public function handleUploadImage()
    {

        $this->fileName="personal_".$this->User->id."_".time().".".$this->User->personal_image->extension();
        $this->User->personal_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserShenasnamehImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.shenasnameh_image');
        $this->User->shenasnameh_image=$this->handleUploadShenasnameh();
    }

    public function handleUploadShenasnameh()
    {
        $this->fileName="shenasnameh_".$this->User->id."_".time().".".$this->User->shenasnameh_image->extension();
        $this->User->shenasnameh_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserEducationImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.education_image');
        $this->User->education_image=$this->handleUploadEducation();
    }

    public function handleUploadEducation()
    {
        $this->fileName="education_".$this->User->id."_".time().".".$this->User->education_image->extension();
        $this->User->education_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserCartmelliImage()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.cartmelli_image');
        $this->User->cartmelli_image=$this->handleUploadCartmelli();
    }

    public function handleUploadCartmelli()
    {
        $this->fileName="cartmelli_image_".$this->User->id."_".time().".".$this->User->cartmelli_image->extension();
        $this->User->cartmelli_image->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }

    public function updatedUserResume()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.resume');
        $this->User->resume=$this->handleUploadresume();
    }

    public function handleUploadResume()
    {
        $this->fileName="resume_".$this->User->id."_".time().".".$this->User->resume->extension();
        $this->User->resume->storeAs('/documents/users',$this->fileName);
        return $this->fileName;
    }


    public function updatedUserSex()
    {
        $this->tabChange('profile');
        $this->validateOnly('User.sex');
    }

    public function updatedUserCodemelli ()
    {
        $this->tabChange('profile');
        $this->validateOnly('User.codemelli');
    }

    public function updatedUserShenasname ()
    {
        $this->tabChange('profile');
        $this->validateOnly('User.shenasname');
    }

    public function updatedUserDatebirth()
    {

        $this->tabChange('profile');
        $this->validateOnly('User.datebirth');
    }

    public function updatedUserTel()
    {
        $this->User->tel=(ltrim($this->User->tel, '0'));
        $this->tabChange('infoContact');
        $this->validateOnly('User.tel');
    }

    public function updatedUserEmail()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.email');
    }

    public function updatedUserStateId()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.state_id');
    }

    public function updatedUserCityId()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.city_id');
    }

    public function updatedUserAddress()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.address');
    }

    public function updatedUserInstagram()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.instagram');
    }

    public function updatedUserTelegram()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.telegram');
    }

    public function updatedUserLinkedin()
    {
        $this->tabChange('infoContact');
        $this->validateOnly('User.linkedin');
    }


    public function updatedUserFather()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.father');
    }

    public function updatedUserBorn()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.born');
    }

    public function updatedUserEducation()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.education');
    }

    public function updatedUserReshteh()
    {
        $this->tabChange('infoConstract');
        $this->validateOnly('User.reshteh');
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
            $this->User->introduced=$this->checkIntroduced->id;
            //$this->User->save();
        }
        else
        {
            $this->User->introduced=NULL;
        }


    }


    public function save()
    {

        $this->validate([
            'User.fname'          =>'nullable|persian_alpha|max:200',
            'User.lname'          =>'nullable|persian_alpha|max:200',
            'User.sex'            =>'nullable|boolean',
            'User.codemelli'      =>'nullable|numeric|unique:Users,codemelli,'.$this->User->id,
            'User.shenasname'     =>'nullable|numeric',
            'User.datebirth'      =>'nullable|string',
            'User.personal_image' =>'nullable|string|max:200',
            'User.username'       =>'nullable|string|unique:users,username,'.$this->User->id,
            'User.tel'            =>'required|unique:users,tel,'.$this->User->id,
            'User.email'          =>'nullable|email|unique:users,email,'.$this->User->id,
            'User.state_id'       =>'nullable|numeric',
            'User.city_id'        =>'nullable|numeric',
            'User.address'        =>'nullable|string|max:200',
            'User.instagram'      =>'nullable|string|max:200|',
            'User.telegram'       =>'nullable|string|max:200|',
            'User.linkedin'       =>'nullable|string|max:200|',
            'User.father'         =>'nullable|persian_alpha|max:200|',
            'User.married'        =>'nullable|boolean',
            'User.born'           =>'nullable|string|max:200|',
            'User.education'      =>'nullable|in:دیپلم,فوق دیپلم,لیسانس,فوق لیسانس,دکتری و بالاتر,زیردیپلم|',
            'User.reshteh'        =>'nullable|string|',
            'User.job'            =>'nullable|string|',
            'User.gettingknow'    =>'nullable|numeric|',
            'User.shenasnameh_image' =>'nullable|string|max:200',
            'User.cartmelli_image' =>'nullable|string|max:200',
            'User.education_image' =>'nullable|string|max:200',
            'User.resume'          =>'nullable|string|max:200',
        ]);

        $this->User->save();

        $this->emit('toast','success','اطلاعات با موفقیت بروزرسانی شد');
        return redirect(route('admin.user.profile',$this->User->id));
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




}
