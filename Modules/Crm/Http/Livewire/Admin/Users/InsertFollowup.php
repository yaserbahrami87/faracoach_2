<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use App\Providers\JalaliDateServiceProvider;
use App\Services\JalaliDate;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Crm\Entities\Followup;
use Modules\Crm\Entities\Problemfollowup;
use Modules\Crm\Entities\Setting;
use Modules\Crm\Entities\Tag;
use Modules\Crm\Entities\TagCategory;
use Modules\Crm\Entities\User;
use Modules\Lms\Entities\Course;

class InsertFollowup extends Component
{
    public $User;
    public $followup;
    public $tags;
    public $tagCategories;
    public $courses;
    public $problemfollowups;
    public $expertFollowups;
    public $readyToLoad=false;
    public $course_id;
    public $followby_expert;
    public $sms;

    protected $listeners=['showFollowings'];

    protected function rules()
    {
        return[
            'followup.course_id'            =>'required|numeric',
            'followup.tags'                 =>'required|array|min:1',
            'followup.talktime'             =>'required|numeric|min:0',
            'followup.comment'              =>'required|string|max:200|',
            'followup.status_followups'     =>'required|numeric|',
            'followup.problemfollowup_id'   =>'required|numeric|min:0|',
            'followup.time_fa'              =>'required|date_format:H:i|min:0|',
            'followup.date_fa'              =>'required|date_format:Y/m/d|max:11',
            'followup.nextfollowup_date_fa' =>'nullable|date_format:Y/m/d|max:11',
            'followup.sms'                  =>'nullable|max:200',
            'followby_expert'               =>'required|numeric|min:0',
        ];
    }

    public function mount(User $user)
    {
        $this->User=$user;
        $this->followup=new Followup();
        $this->followup->tags=[];
    }

    public function render()
    {
        $this->courses=Course::where('start','>=',JalaliDate::get_jalaliNow())
                    ->where('status',1)
                    ->get();

        $this->tags=Tag::where('status',1)
                            ->get();

        // \App\Services\JalaliDate::get_timeNow()

        $this->tagCategories=TagCategory::where('parent_id','0')
                                        ->where('status','1')
                                        ->get();
        $this->problemfollowups=Problemfollowup::where('status',1)
                                    ->get();
        $this->expertFollowups=User::wherebetween('type',[1,10])
                                ->get();

        $this->dispatchBrowserEvent('plugins2');


        $this->sms=Setting::where('setting','sms_followups')
                                ->get();

        foreach ($this->sms as $item)
        {
            if(is_null($this->User->sex))
            {
                $item->value=str_replace('{sex}','',$item->value);
            }
            elseif($this->User->sex==1)
            {
                $item->value=str_replace('{sex}','آقای ',$item->value);
            }
            elseif($this->User->sex==0)
            {
                $item->value=str_replace('{sex}','خانم ',$item->value);
            }
            $item->value=str_replace('{fname}',$this->User->fname,$item->value);
            $item->value=str_replace('{lname}',$this->User->lname,$item->value);
            $item->value=str_replace('{followby_expert}',Auth::user()->fname.' '.Auth::user()->lname,$item->value);
            $item->value=str_replace('{admin_tel}',Auth::user()->tel,$item->value);
            $item->value=str_replace('{telegram}',Auth::user()->telegram,$item->value);
            $item->value=str_replace('{datebirth}',$this->User->datebirth ,$item->value);
            $item->value=str_replace('{tel}',$this->User->tel ,$item->value);
            $item->value=str_replace('{nextDate}',$this->followup->nextfollowup_date_fa ,$item->value);

        }

        return view('crm::livewire.admin.users.insert-followup');
    }

    public function showFollowings()
    {
        $this->readyToLoad=true;
    }

    public function updatedFollowupCourseId()
    {
        $this->validateOnly('followup.course_id');
    }

    public function updatedFollowupTags()
    {
        $this->validateOnly('followup.tags');
    }

    public function updatedFollowupComment()
    {
        $this->validateOnly('followup.comment');
    }

    public function updatedFollowupProblemfollowupId()
    {
        $this->validateOnly('followup.problemfollowup_id');
    }

    public function updatedFollowbyExpert()
    {
        $this->validateOnly('followby_expert');
    }

    public function updatedFollowupDateFa()
    {
        $this->validateOnly('followup.date_fa');

    }

    public function updatedFollowupNextfollowupDateFa()
    {
        $this->validateOnly('followup.nextfollowup_date_fa');

    }

    public function updatedFollowupTimeFa()
    {
        $this->validateOnly('followup.time_fa');
    }

    public function updatedFollowupSms()
    {
        $this->validateOnly('followup.sms');
    }

    public function save()
    {

        if(!is_array($this->followup->tags))
        {
            $this->followup->tags=explode(',',$this->followup->tags);
        }

        $this->validate();
        $this->followup->tags=implode(',',$this->followup->tags);
        $this->followup->insert_user_id =Auth::user()->id;
        $this->followup->user_id =$this->User->id;
        $this->followup->datetime_fa=$this->followup->date_fa.' '.$this->followup->time_fa;
        Followup::where('user_id',$this->User->id)
                    ->update(['flag'=>0]);
        $this->followup->flag=1;

        $this->followup->save();
        $this->User->followby_expert=$this->followby_expert;
        $this->User->tel_verified=1;
        $this->User->type=$this->followup->status_followups;
        $this->User->save();
        if(!is_null($this->sms))
        {
            //$this->sendSms($this->User->tel,$this->sms);
        }



        $this->emit('toast','success','پیگیری با موفقیت ثبت شد');
        $this->redirectRoute('admin.users.all');
    }
}
