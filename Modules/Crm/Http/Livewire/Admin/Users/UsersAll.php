<?php

namespace Modules\Crm\Http\Livewire\Admin\Users;

use App\Services\JalaliDate;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Crm\Entities\User;

class UsersAll extends Component
{
    public $users;
    public $users_all;
    public $users_leads;
    public $users_continueFollowup;
    public $marketing1;
    public $marketing2;
    public $marketing3;
    public $todayFollowups;
    public $expiredFollowups;
    public $doneTodayFollowups;
    public $users_waiting;
    public $users_noanswer;

    public $resources;
    public $resource;
    public $readyToLoad=false;
    public $test=0;
    public $userType;
    public $user_admin;

    protected $queryString=['resource','userType'];

    public function mount($users=NULL)
    {

            $this->users=$users->when(($this->user_admin==1),function($query)
                        {
                            $query->where('followby_expert',Auth::user()->id);
                        });
    }

    public function render()
    {

//        if($this->user_admin==1)
//        {
//            $this->users=$this->users->where('followby_expert',Auth::user()->id);
//        }
//        if($this->readyToLoad==false)
//        {
//            $this->users=[];
//        }
//        $this->users= $this->readyToLoad
//            ? User::get()
//            : [];
//        if($this->users==[])
//        {
//
//            $this->users= $this->readyToLoad
//                ? User::get()
//                : [];
//        }
//        else
//        {
//
//            $this->users=User::where('resource',$this->resource)
//                ->get();
//        }


        $this->resources=User::when(($this->user_admin==1),function($query)
                                {
                                    return $query->where('followby_expert',Auth::user()->id);
                                })
                                ->groupby('resource')
                                ->get();


        $this->dispatchBrowserEvent('dataTable');


        $this->users_all=User::when(($this->user_admin==1),function($query)
                                {
                                    $query->where('followby_expert',Auth::user()->id);
                                })->count();

        $this->users_leads=User::where('type',1)
                                ->count();

        $this->users_continueFollowup=User::where('type',11)
                                        ->when(($this->user_admin==1),function($query)
                                        {
                                            $query->where('followby_expert',Auth::user()->id);
                                        })
                                        ->count();

        $this->marketing1=User::where('type',-1)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->marketing2=User::where('type',-2)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->marketing3=User::where('type',-3)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->users_waiting=User::where('type',13)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->users_noanswer=User::where('type',14)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->users_customer=User::where('type',20)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->users_meeting=User::where('type',30)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->users_event=User::where('type',40)
                                    ->when(($this->user_admin==1),function($query)
                                    {
                                        $query->where('followby_expert',Auth::user()->id);
                                    })
                                    ->count();

        $this->todayFollowups=User::with('followups')
                        ->whereHas('followups',function ($query)
                        {
                            $query->where('nextfollowup_date_fa',JalaliDate::get_jalaliNow())
                                    ->where('flag',1);
                        })
                        ->when(($this->user_admin==1),function($query)
                        {
                            $query->where('followby_expert',Auth::user()->id);
                        })
                        ->count();
        $this->expiredFollowups=User::with('followups')
                        ->whereHas('followups',function ($query)
                        {
                            $query->where('nextfollowup_date_fa','<',JalaliDate::get_jalaliNow())
                                                ->where('flag',1);
                        })
                        ->when(($this->user_admin==1),function($query)
                        {
                            $query->where('followby_expert',Auth::user()->id);
                        })
                        ->count();

        $this->doneTodayFollowups=User::with('followups')
                        ->whereHas('followups',function ($query)
                        {
                            $query->where('nextfollowup_date_fa',JalaliDate::get_jalaliNow())
                                ->where('flag',1);
                        })
                        ->when(($this->user_admin==1),function($query)
                        {
                            $query->where('followby_expert',Auth::user()->id);
                        })
                        ->count();

        return view('crm::livewire.admin.users.users-all');
    }

    public function loadUsers()
    {
        $this->readyToLoad=true;
    }

    public function updatedResource()
    {

        $this->users=User::when((!is_null($this->resource ) && $this->resource!='NULL'&& $this->resource!=''),function($query)
                {
                    $query->where('resource',$this->resource);
                })
                ->when(($this->user_admin==1),function($query)
                {
                    $query->where('followby_expert',Auth::user()->id);
                })
                ->orderby('id','desc')
                ->get();
    }

    public function userType($userType)
    {
        $this->userType=$userType;
        if($this->userType=='NULL')
        {
            $this->users=User::when(($this->user_admin==1),function($query)
            {
                $query->where('followby_expert',Auth::user()->id);
            })
            ->when(($this->user_admin==1),function($query)
            {
                $query->where('followby_expert',Auth::user()->id);
            })
            ->orderby('id','desc')
            ->get();
        }
        elseif($this->userType=='todayFollowups')
        {
            $this->users=User::with('followups')
                ->whereHas('followups',function ($query)
                {
                    $query->where('nextfollowup_date_fa',JalaliDate::get_jalaliNow())
                        ->where('flag',1);
                })
                ->when(($this->user_admin==1),function($query)
                {
                    $query->where('followby_expert',Auth::user()->id);
                })
                ->orderby('id','desc')
                ->get();
        }
        elseif($this->userType=='todayFollowups')
        {
            $this->users=User::with('followups')
                ->whereHas('followups',function ($query)
                {
                    $query->where('nextfollowup_date_fa',JalaliDate::get_jalaliNow())
                        ->where('flag',1);
                })
                ->when(($this->user_admin==1),function($query)
                {
                    $query->where('followby_expert',Auth::user()->id);
                })
                ->orderby('id','desc')
                ->get();
        }
        elseif($this->userType=='expiredFollowups')
        {
            $this->users=User::with('followups')
                ->whereHas('followups',function ($query)
                {
                    $query->where('nextfollowup_date_fa','<',JalaliDate::get_jalaliNow())
                        ->where('flag',1);
                })
                ->when(($this->user_admin==1),function($query)
                {
                    $query->where('followby_expert',Auth::user()->id);
                })
                ->orderby('id','desc')
                ->get();
        }
        elseif($this->userType=='doneTodayFollowups')
        {
            $this->users=User::with('followups')
                ->whereHas('followups',function ($query)
                {
                    $query->where('date_fa',JalaliDate::get_jalaliNow())
                                    ->where('flag',1);
                })
                ->when(($this->user_admin==1),function($query)
                {
                    $query->where('followby_expert',Auth::user()->id);
                })
                ->orderby('id','desc')
                ->get();
        }
        else
        {
            $this->users=User::where('type',$userType)
                ->orderby('id','desc')
                ->get();
        }

    }

}
