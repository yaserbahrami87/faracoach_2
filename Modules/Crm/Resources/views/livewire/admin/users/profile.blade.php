@slot('headerScript')

    <link href="{{asset('/dashboard/plugins/kamaDatepicker/dist/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <style>
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 130px;
            height: 130px;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 14px;
            line-height: 2;
            /*color: #818182;*/
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work p.title
        {

        }

        .profile-work a{
            text-decoration: none;
            /*color: #495057;*/
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
    </style>
@endslot


<div class="container-fluid emp-profile">
    <div >

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img mb-3">

                        @if(is_null($user->personal_image))
                            <img class="border border-2 img-thumbnail" src="/images/users/default-avatar.png" alt="" width="230px"/>
                        @else
                            <img  class="border border-2 img-thumbnail" src="/documents/users/{{$user->personal_image}}" width="230px"/>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="profile-head">

                        <!--
                        <h6>
                            Web Developer and Designer
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        -->

                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  {{$tab=='profile'?'active':''}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true" wire:click="showFollowings('profile')"  >پروفایل</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{$tab=='followings'?'active':''}}" id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false" wire:click="showFollowings('followings')" >پیگیری ها <span class="badge badge-success">{{$user->followups->count()}}</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{$tab=='invitation'?'active':''}}" id="invitation-tab" data-toggle="tab" href="#invitation" role="tab" aria-controls="invitation" aria-selected="false" wire:click="showFollowings('invitation')" >تعداد معرفی شده <span class="badge badge-success">{{$user->get_invitation->count()}}</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">


                </div>
            </div   >
            <div class="row">
                <div class="col-md-4">

                    <div class="profile-work">
                        <h5 class="text-center">{{$user->fname.' '.$user->lname}}</h5>
                        <p class="m-0">وضعیت: <span>{{$user->userType->type}}</span></p>

                        @if(!is_null($user->get_insertuserInfo))
                            <p class="m-0">ثبت شده توسط:
                                <a href="{{route('admin.user.profile',$user->get_insertuserInfo->id)}}" target="_blank" >
                                    {{$user->get_insertuserInfo->fname.' '.$user->get_insertuserInfo->lname}}
                                </a>
                            </p>
                        @endif


                        @if(!is_null($user->get_followByExpert))
                            <p class="m-0">مسئول پیگیری:
                                <a href="{{route('admin.user.profile',$user->get_followByExpert->id)}}" target="_blank">
                                    {{$user->get_followByExpert->fname.' '.$user->get_followByExpert->lname}}
                                </a>
                            </p>
                        @endif

                        @if(!is_null($user->get_introduced))
                            <p class="m-0">معرف:
                                <a href="{{route('admin.user.profile',$user->get_introduced->id)}}" target="_blank">
                                    {{$user->get_introduced->fname.' '.$user->get_introduced->lname}}
                                </a>
                            </p>
                        @endif
                        <p class="m-0">تاریخ ثبت نام:
                            {{\App\Services\JalaliDate::changeTimestampToShamsi($user->created_at)}}
                        </p>

                        <form class="d-inline-block mb-2" method="post" action="{{route('admin.user.loginWithUser',['User'=>$user])}}" onsubmit="return window.confirm('آیا از ورود با اکانت کاربر اطمینان دارید؟')">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-outline-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="ورود با اکانت کاربر">
                                <i class="nav-icon material-icons">login</i>
                            </button>
                        </form>

                        <button class="btn btn-outline-warning btn-sm"
                                data-toggle="tooltip" data-placement="top" title="تغییر رمز"
                                wire:key="{{$user->id}}"
                                wire:click="$emit('openModal', 'crm::admin.users.change-password',{{ json_encode(['user' => $user->id]) }})">
                            <i class="nav-icon material-icons">key</i>
                        </button>

                        <form method="post" wire:submit.prevent="changeType">
                            <div class="input-group mb-3">
                                    <select class="custom-select" id="userType" wire:model.lazy="user.type">
                                        <option value="NULL">انتخاب کنید</option>
                                        <option value="2" {{ old('sex',$user->type)=="2" ? 'selected': '' }} >مدیر</option>
                                        <option value="3" {{ old('sex',$user->type)=="3" ? 'selected': '' }} >فروش</option>
                                        <option value="4" {{ old('sex',$user->type)=="4" ? 'selected': '' }} >کلینیک</option>
                                        <option value="5" {{ old('sex',$user->type)=="5" ? 'selected': '' }} >آموزش</option>
                                        <option value="6" {{ old('sex',$user->type)=="6" ? 'selected': '' }} >کال سنتر</option>
                                        <option value="7" {{ old('sex',$user->type)=="7" ? 'selected': '' }} >سوشیال</option>
                                        <option value="1" {{ old('sex',$user->type)=="1" ? 'selected': '' }} >کاربر ساده</option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="submit">تغییر دسترسی</button>
                                    </div>
                            </div>
                        </form>


                        <p>دوره های گذرانده / در حال برگزاری:</p>

                        <p>رویدادهای شرکت کرده:</p>

                        <p>مدارک:</p>
                        @if(!is_null($user->shenasnameh_image))
                            <a href="/documents/users/{{$user->shenasnameh_image}}" target="_blank">شناسنامه</a><br/>
                        @endif

                        @if(!is_null($user->cartmelli_image))
                            <a href="/documents/users/{{$user->cartmelli_image}}" target="_blank">کارت ملی</a><br/>
                        @endif

                        @if(!is_null($user->education_image))
                            <a href="/documents/users/{{$user->education_image}}" target="_blank">مدرک تحصیلی</a><br/>
                        @endif

                        @if(!is_null($user->resume))
                            <a href="/documents/users/{{$user->resume}}" target="_blank">رزومه</a><br/>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade {{($tab=='profile')?'show active':''}}" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
                            @if($errors->any())
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </div>
                                </div>
                            @endif


                            <form  wire:submit.prevent="save" wire:offline.attr="disabled" wire:loading.remove>
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <div class="card card-user">
                                    <div class="card-header bg-light">
                                        <a type="button" class="row border-bottom" data-toggle="collapse" data-target="#infoProfile" aria-expanded="false" aria-controls="infoProfile">
                                            <div class="col-md-8">
                                                <h6 class="card-title m-0">اطلاعات شخصی</h6>
                                            </div>

                                            <div class="col-md-4  text-right">
                                                <svg class=" @if((strlen($user->fname)>0)&&(strlen($user->lname)>0)&&(strlen($user->codemelli)>0)&&(strlen($user->shenasname)>0)&& (strlen($user->personal_image)>0)&& (strlen($user->datebirth)>0)&&(strlen($user->sex)>0)) text-muted @else  text-danger  @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body collapse bg-secondary-light border-1 border-secondary {{$tabChange=='profile'?'show':''}}" id="infoProfile">
                                        <div class="row">
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>نام</label>
                                                    <input type="text" class="form-control {{(is_null($user->fname))? 'is-invalid' : 'is-valid'}}" placeholder="نام را وارد کنید"   name="fname" wire:model.lazy="User.fname"  />
                                                </div>
                                                @error('User.fname')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>نام خانوادگی</label>
                                                    <input type="text" class="form-control {{(is_null($user->lname))? 'is-invalid':'is-valid'}}" placeholder="نام خانوادگی را وارد کنید"   name="lname"  wire:model.lazy="User.lname"   />
                                                </div>
                                                @error('User.lname')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">جنسیت</label>
                                                    <div class="form-group">
                                                        <select class="form-control p-0 {{(is_null($user->sex)) ? 'is-invalid' : 'is-valid' }}" id="sex" name="sex" wire:model.lazy="User.sex" >
                                                            <option selected >انتخاب کنید</option>
                                                            <option value="0"  {{ old('sex',$user->sex)=="0" ? 'selected='.'"'.'selected'.'"' : '' }}  >زن</option>
                                                            <option value="1"  {{ old('sex',$user->sex)=="1" ? 'selected='.'"'.'selected'.'"' : '' }}>مرد</option>
                                                        </select>
                                                        @error('User.sex')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label for="codemelli">کد ملی</label>
                                                    <input type="text" class="form-control {{is_null($user->codemelli) ? 'is-invalid' : 'is-valid'}}" placeholder="کد ملی را وارد کنید" id="codemelli" name="codemelli" wire:model.lazy="User.codemelli"  />
                                                    @error('User.codemelli')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>شماره شناسنامه</label>
                                                    <input type="text" class="form-control {{is_null($user->shenasname)? 'is-invalid' : 'is-valid' }}" placeholder="شماره شناسنامه را وارد کنید" name="shenasname" wire:model.lazy="User.shenasname"  />
                                                    @error('User.shenasname')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>تاریخ تولد</label>
                                                    <input type="text" id="persianDatePicker" class="dateInput form-control {{is_null($user->datebirth)? 'is-invalid' : 'is-valid' }}" wire:model="User.datebirth" autocomplete="off" />

                                                    @error('User.datebirth')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>عکس پروفایل</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{is_null($user->personal_image)? 'is-invalid' : 'is-valid' }}" id="inputpersonal_image" name="personal_image" wire:model.lazy="User.personal_image" />
                                                        <label class="custom-file-label" for="inputpersonal_image">انتخاب فایل</label>
                                                        <small>فرمت مورد قبول: JPG,JPEG,PNG / حداکثر 1 مگابایت</small>

                                                    </div>
                                                    @error('User.personal_image')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>نام کاربری</label>
                                                    <input type="text" class="form-control {{is_null($user->username)?'is-invalid' : 'is-valid' }}" placeholder="نام کاربری خود را وارد کنید"  name="username" wire:model.lazy="User.username" />
                                                    @error('User.username')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-user ">
                                    <div class="card-header bg-light">
                                        <a type="button" class="row  border-bottom" data-toggle="collapse" data-target="#infoContact" aria-expanded="false" aria-controls="infoContact">
                                            <div class="col-md-8">
                                                <h6 class="card-title m-0">اطلاعات تماس</h6>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <svg class="@if((strlen($user->tel)>0)&&(strlen($user->email)>0)&&(strlen($user->state)>0)&&(strlen($user->city)>0)&& (strlen($user->address)>0)) text-muted @else  text-danger  @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body collapse {{$tabChange=='infoContact'?'show':''}} bg-secondary-light border-1 border-secondary" id="infoContact">
                                        <div class="row">
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>تلفن تماس</label>
                                                    <!--
                                                    <input type="hidden" id="tel_org" wire:model.key="User.tel" name="tel"/>-->
                                                    <div class="input-group ">
                                                        <input type="tel" class="form-control {{is_null($user->tel)? 'is-invalid'  : 'is-valid'}}" placeholder="تلفن تماس را وارد کنید" wire:model.lazy="User.tel"  id="tel"   />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text text-danger" id="basic-addon1" dir="ltr">(+98)0</span>

                                                        </div>
                                                        @error('User.tel')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>
                                                    <small class="text-muted">تلفن همراه بدون صفر وارد کنید</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="email">پست الکترونیکی</label>
                                                    <input type="email" class="form-control {{is_null($user->email)? 'is-invalid'  : 'is-valid'}}" placeholder="پست الکترونیکی را وارد کنید" wire:model.lazy="User.email" name="email"  id="email"   />
                                                    @error('User.email')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>استان</label>
                                                    <select class="custom-select {{is_null($user->state_id)? 'is-invalid':'is-valid'}}"  name="state"  id="state" wire:model.change="User.state_id">
                                                        <option selected value="NULL">استان را انتخاب کنید</option>

                                                        @foreach($states as $item)
                                                            <option value="{{$item->id}}"   {{ old('state',$user->state_id)==$item->id ? 'selected='.'"'.'selected'.'"' : '' }} >{{$item->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('User.state_id')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>شهر</label>


                                                    <select class="custom-select {{is_null($user->city_id)? 'is-invalid' : 'is-valid'}}"  name="city"  id="city" wire:model.lazy="User.city_id">
                                                        <option selected value="NULL">شهر را انتخاب کنید</option>
                                                        @foreach($cities as $item_city)
                                                            <option value="{{$item_city->id}}" @if(!is_null($user->city_id) && ($user->city_id==$item_city->id)) selected  @endif >  {{$item_city->name}} </option>
                                                        @endforeach

                                                    </select>
                                                    @error('User.city_id')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-12 px-1">
                                                <div class="form-group">
                                                    <label>آدرس</label>
                                                    <input type="text" class="form-control {{is_null($user->address) ? 'is-invalid':  'is-valid'}}" placeholder="آدرس را وارد کنید" name="address"  wire:model.lazy="User.address" />
                                                    @error('User.address')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>اینستاگرام</label>
                                                    <input type="text" class="form-control {{is_null($user->instagram)?'is-invalid' : 'is-valid'}}" placeholder="صفحه اینستاگرام خود را وارد کنید"  wire:model.lazy="User.instagram" name="instagram"  />
                                                    @error('User.instagram')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>تلگرام</label>
                                                    <input type="text" class="form-control {{is_null($user->telegram)? 'is-invalid' : 'is-valid' }}" placeholder="آیدی تلگرام خود را وارد کنید" wire:model.lazy="User.telegram" name="telegram"  />
                                                    @error('User.telegram')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>لینکدین</label>
                                                    <input type="text" class="form-control {{is_null($user->linkedin)? 'is-invalid':'is-valid'}}" placeholder="آیدی لینکدین خود را وارد کنید"  wire:model.lazy="User.linkedin" name="linkedin"  />
                                                    @error('User.linkedin')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-user">
                                    <div class="card-header bg-light">
                                        <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#infoConstract" aria-expanded="false" aria-controls="infoConstract">
                                            <div class="col-md-8">
                                                <h6 class="card-title m-0">اطلاعات قرارداد</h6>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <svg class="@if((strlen($user->father)>0)&&(strlen($user->married)>0)&&(strlen($user->born)>0)&& (strlen($user->education)>0)&& (strlen($user->reshteh)>0)&& (strlen($user->shenasnameh_image)>0)&& (strlen($user->cartmelli_image)>0)&& (strlen($user->education_image)>0)&& (strlen($user->job)>0)) text-muted @else  text-danger  @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body collapse {{$tabChange=='infoConstract'?'show':''}}  bg-secondary-light border-1 border-secondary" id="infoConstract">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-warning" role="alert">
                                                    <small>این اطلاعات صرفاجهت عقد قراردادهای آموزشی و ارائه خدمات کوچینگ مورد نیاز است</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>نام پدر</label>
                                                    <input type="text" class="form-control {{is_null($user->father)? 'is-invalid' : 'is-valid'}}" placeholder=" نام پدر را وارد کنید"  wire:model.lazy="User.father"  name="father" />
                                                    @error('User.father')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>تاهل</label>
                                                    <div class="form-group">
                                                        <select class="form-control p-0 {{is_null($user->married)? 'is-invalid' : 'is-valid'}}" id="exampleFormControlSelect1" name="married" wire:model.lazy="User.married" >
                                                            <option selected value="NULL">انتخاب کنید</option>
                                                            <option value="0" {{ old('married',$user->married)=="0" ? 'selected='.'"'.'selected'.'"' : '' }} >مجرد</option>
                                                            <option value="1" {{ old('married',$user->married)=="1" ? 'selected='.'"'.'selected'.'"' : '' }} >متاهل</option>
                                                        </select>
                                                        @error('User.married')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>شهر تولد</label>
                                                    <input type="text" class="form-control {{is_null($user->born) ? 'is-invalid' : 'is-valid'}}" placeholder="شهر تولد را وارد کنید"  wire:model.lazy="User.born" name="born" />
                                                    @error('User.born')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>تحصیلات</label>
                                                    <select id="education" class="form-control p-0 {{is_null($user->education)? 'is-invalid':'is-valid' }}  " name="education" wire:model.lazy="User.education">
                                                        <option selected >انتخاب کنید</option>
                                                        <option {{ old('education',$user->education)=="زیردیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}   >زیردیپلم</option>
                                                        <option {{ old('education',$user->education)=="دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>دیپلم</option>
                                                        <option {{ old('education',$user->education)=="فوق دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>فوق دیپلم</option>
                                                        <option {{ old('education',$user->education)=="لیسانس" ? 'selected='.'"'.'selected'.'"' : '' }}>لیسانس</option>
                                                        <option {{ old('education',$user->education)=="فوق لیسانس" ? 'selected='.'"'.'selected'.'"' : '' }}>فوق لیسانس</option>
                                                        <option {{ old('education',$user->education)=="دکتری و بالاتر" ? 'selected='.'"'.'selected'.'"' : '' }}>دکتری و بالاتر</option>
                                                    </select>
                                                    @error('User.education')
                                                    <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>رشته</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control {{is_null($user->reshteh)? 'is-invalid'  : 'is-valid' }}" placeholder="رشته را وارد کنید" wire:model.lazy="User.reshteh"  name="reshteh"  />
                                                        @error('User.reshteh')
                                                        <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>شغل</label>
                                                    <div class="form-group">
                                                        <input type="text" class="time_fa form-control {{is_null($user->job)?'is-invalid' : "is-valid" }}" placeholder="شغل را وارد کنید" wire:model.lazy="User.job"  name="job" />
                                                        @error('User.job')
                                                        <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>عکس شناسنامه</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{is_null($user->shenasnameh_image) ?'is-invalid'  : 'is-valid' }}" id="inputshenasnameh_image" aria-describedby="inputshenasnameh_image" name="shenasnameh_image" wire:model="User.shenasnameh_image" />
                                                        <label class="custom-file-label" for="inputshenasnameh_image">Choose file</label>
                                                    </div>
                                                    <small>فرمت مورد قبول: JPG,JPEG,PNG / حداکثر 1 مگابایت</small>
                                                    @error('User.shenasnameh_image')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>عکس کارت ملی</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{is_null($user->cartmelli_image)?'is-invalid' : 'is-valid' }}" id="inputcartmelli_image" aria-describedby="inputcartmelli_image" name="cartmelli_image" wire:model="User.cartmelli_image">
                                                        <label class="custom-file-label" for="inputcartmelli_image">Choose file</label>
                                                        <small>فرمت مورد قبول: JPG,JPEG,PNG / حداکثر 1 مگابایت</small>
                                                    </div>
                                                    @error('User.cartmelli_image')
                                                    <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>عکس مدرک تحصیلی</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{is_null($user->education_image)? 'is-invalid': 'is-valid' }}" id="inputeducation_image" aria-describedby="inputeducation_image" name="education_image" wire:model="User.education_image"  />
                                                        <label class="custom-file-label" for="inputeducation_image">Choose file</label>
                                                        <small>فرمت مورد قبول: JPG,JPEG,PNG / حداکثر 1 مگابایت</small>

                                                    </div>
                                                    @error('User.education_image')
                                                    <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>رزومه</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{is_null($user->resume)? 'is-invalid' : 'is-valid'}} " id="resume" aria-describedby="resume" name="resume" wire:model="User.resume" />
                                                        <label class="custom-file-label" for="resume">Choose file</label>
                                                        <small>فرمت مورد قبول: JPG,JPEG,PNG,PDF / حداکثر 1 مگابایت</small>
                                                    </div>
                                                </div>
                                                @error('User.resume')
                                                <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card card-user">
                                    <div class="card-header bg-light">
                                        <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#infogettingKnow" aria-expanded="false" aria-controls="infogettingKnow">
                                            <div class="col-8">
                                                <h6 class="card-title m-0">آشنایی</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <svg class="@if((strlen($user->gettingknow)>0)&&(strlen($user->introduced)>0)&&(strlen($user->resource)>0)&&(strlen($user->detailsresource)>0)) text-muted @else  text-danger  @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                                    <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body collapse  {{$tabChange=='infogettingKnow'?'show':''}} bg-secondary-light border-1 border-secondary " id="infogettingKnow">

                                        <div class="row">
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">

                                                    <label>نحوه آشنایی</label>
                                                    <select id="gettingknow_parent" class="form-control p-0 {{is_null($user->gettingknow)? 'is-invalid': 'is-valid'}}  @error('gettingknow') is-invalid @enderror" name="gettingKnow_parent" wire:model.change="gettingKnowParent" >
                                                        <option selected value="NULL">انتخاب کنید</option>
                                                        @if(!is_null($gettingKnowList))
                                                            @foreach($gettingKnowList as $item)
                                                                <option value="{{$item->id}}"  {{($user->gettingKnowParent==$item->id) ? 'selected' : '' }} >{{$item->category}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 px-1" id="gettingknow2">
                                                <div class="form-group">
                                                    <label>عنوان آشنایی</label>

                                                    <select id="gettingknow" class="form-control p-0 {{is_null($user->gettingknow)? 'is-invalid' : 'is-valid'}}  @error('gettingknow') is-invalid @enderror" wire:model.lazy="User.gettingknow" >
                                                        <option selected value="NULL">انتخاب کنید</option>
                                                        @if(!is_null($gettingKnow_children))
                                                            @foreach($gettingKnow_children as $item)
                                                                    <option value="{{$item->id}}" {{$item->id==$user->gettingknow ? 'selected':''}} >{{$item->category}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6 px-1">
                                                <label>معرف</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control {{is_null($user->introduced)? 'is-invalid': 'is-valid' }}" wire:model.lazy="introduced"    id="introduced" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-danger" id="basic-addon1" dir="ltr">(+98)0</span>
                                                    </div>
                                                </div>
                                                <small class="d-block text-muted">تلفن معرف بدون 0 و پیش شماره وارد شود</small>
                                                @if(is_null($user->introduced))
                                                    <p class="text-danger">معرف یافت نشد</p>
                                                @else
                                                    <span id="feedback_introduced" >معرف:
                                                            <a href="{{route('admin.user.profile',$user->introduced)}}" >

                                                                {{!is_null($user->introduced)? $user->get_introduced->fname.' '.$user->get_introduced->lname :''}}
                                                            </a>
                                                    </span>
                                                @endif
                                                @error('introduced')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>نحوه ورود به فراکوچ</label>
                                                    <input type="text" class="form-control @if(strlen($user->resource)==0) is-invalid  @else is-valid  @endif" disabled="disabled"  value="{{old('resource',$user->resource)}}" name="resource"  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-1">
                                    <div class="update m-auto m-auto">
                                        <button type="submit" class="btn btn-primary btn-round" wire:offline.attr="disabled">بروزرسانی اطلاعات</button>
                                    </div>
                                </div>
                            </form>

                            <div class="alert alert-warning" wire:offline>
                                <i class="bi bi-wifi-off"></i> مشکل در اتصال به اینترنت رخ داد است
                            </div>


                            <div class="col-12 text-center" wire:loading >
                                <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                                    <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                                    <circle cx="170" cy="170" r="135" stroke="#404041"/>
                                    <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                                    <circle cx="170" cy="170" r="85" stroke="#404041"/>
                                </svg>
                            </div>

                        </div>

                        <!-- Following -->
                        <div class="tab-pane fade {{($tab=='followings')?'show active':''}}" id="following" role="tabpanel" aria-labelledby="following-tab">
                            @if($user->followby_expert==Auth::user()->id || is_null($user->followby_expert))

                                <livewire:crm::admin.users.insert-followup :User="$user->id"  />
                            @else

                                <div class="alert alert-warning">
                                    شما مجاز به ثبت پیگیری برای این شخص نمیباشید
                                </div>
                            @endif

                            <livewire:crm::admin.users.profile-followups :User="$user->id"  />
                        </div>
                        <!-- Invitation -->
                        <div class="tab-pane fade {{($tab=='invitation')?'show active':''}}" id="invitation" role="tabpanel" aria-labelledby="invitation-tab">

                            <livewire:crm::admin.users.profile-invitations :User="$user->id"  />
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

@slot('footerScript')

    <script>

        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>

    <!--  DATE SHAMSI PICKER  --->

    <script>
        window.addEventListener('plugins',()=>
        {
            let head = document.getElementsByTagName('HEAD')[0];
            let link4 = document.createElement('script');
            link4.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
            head.appendChild(link4);

            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('#date_fa').simpleMask({
                'mask': ['##:##','##:##']
            })

        });
    </script>



    <script src="/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js"></script>
    <script>
        $('.dateInput').simpleMask({
            'mask': ['####-####','#####-####']
        });

        $('#time_fa').simpleMask({
            'mask': ['##:##','##:##']
        });
    </script>



@endslot


