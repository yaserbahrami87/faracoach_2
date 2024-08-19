@component('masterView::user.master.index')
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                @if(is_null(Auth::user()->personal_image))
                    <img class="profile-user-img img-fluid img-circle" src="/images/users/default-avatar.png" />
                @else
                    <img class="profile-user-img img-fluid img-circle" src="{{'/documents/users/'.Auth::user()->personal_image}}" />
                @endif
            </div>

            <h3 class="profile-username text-center">{{Auth::user()->fname.' '.Auth::user()->lname}}</h3>

            <p class="text-muted text-center">{{Auth::user()->job}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>دنبال شونده</b> <a class="float-right">0</a>
                </li>
                <li class="list-group-item">
                    <b>دنبال کننده</b> <a class="float-right">0</a>
                </li>
            </ul>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">درباره من</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fa fa-book mr-1"></i> تحصیلات</strong>

            <p class="text-muted">
                {{Auth::user()->education}}
            </p>

            <hr>

            <strong><i class="fa fa-map-marker mr-1"></i> موقعیت</strong>

            @if(!is_null(Auth::user()->state) && !is_null(Auth::user()->city))
                <p class="text-muted">{{Auth::user()->state->name.','.Auth::user()->city->name}}</p>
            @endif

            <hr />
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#personality" data-toggle="tab">اطلاعات شخصی</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacts" data-toggle="tab">اطلاعات تماس</a></li>
                <li class="nav-item"><a class="nav-link" href="#gettingknow" data-toggle="tab">نحوه آشنایی</a></li>
                <li class="nav-item"><a class="nav-link" href="#contract" data-toggle="tab">اطلاعات قرارداد</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="personality">
                    <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card card-user">
                            <div class="card-body bg-secondary-light" id="infoProfile">
                                <div class="row">
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>نام<span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->fname)?'is-valid':''}}" placeholder="نام را وارد کنید" @if(old('fname')) value='{{old('fname')}}' @else value="{{old('fname',Auth::user()->fname) }}" @endif name="fname"  autocomplete="autocomplete"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>نام خانوادگی<span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->lname)?'is-valid':''}} " placeholder="نام خانوادگی را وارد کنید" @if(old('lname')) value='{{old('lname')}}' @else value="{{old('lname',Auth::user()->lname)}}" @endif name="lname"   autocomplete="autocomplete" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>نام انگلیسی<span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->fname_en)?'is-valid':''}}" placeholder="نام انگلیسی را وارد کنید" @if(old('fname_en')) value='{{old('fname_en')}}' @else value="{{old('fname_en',Auth::user()->fname_en) }}" @endif name="fname_en"  autocomplete="autocomplete" {{!is_null(Auth::user()->fname_en)?'disabled':''}} />
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>نام خانوادگی انگلیسی<span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->lname_en)?'is-valid':''}}" placeholder="نام خانوادگی انگلیسی را وارد کنید" @if(old('lname_en')) value='{{old('lname_en')}}' @else value="{{old('lname_en',Auth::user()->lname_en)}}" @endif name="lname_en"   autocomplete="autocomplete" {{!is_null(Auth::user()->lname_en)?'disabled':''}} />
                                        </div>
                                    </div>

                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label for="codemelli">کد ملی</label>
                                            <input type="text" class="form-control  {{!is_null(Auth::user()->codemelli)?'is-valid':''}}" placeholder="کد ملی را وارد کنید"  value="{{Auth::user()->codemelli}}" {{(!is_null(Auth::user()->codemelli)?'disabled':'')}} id="codemelli" name="codemelli"  autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>شماره شناسنامه</label>
                                            <input type="text" class="form-control  {{!is_null(Auth::user()->shenasname)?'is-valid':''}}" placeholder="شماره شناسنامه را وارد کنید" value='{{old('shenasname',Auth::user()->shenasname)}}'  name="shenasname"  autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>تاریخ تولد</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->datebirth?'is-valid':'')}}" placeholder="تاریخ تولد را وارد کنید"  value='{{old('datebirth',Auth::user()->datebirth)}}' name="datebirth" id="datebirth" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>عکس پروفایل</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{!is_null(Auth::user()->personal_image?'is-valid':'')}}" id="inputpersonal_image" aria-describedby="inputpersonal_image" name="personal_image"/>
                                                <label class="custom-file-label" for="inputpersonal_image">Choose file</label>
                                            </div>
                                            <small class="text-muted">فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>نام کاربری</label>
                                            <span class="text-danger font-weight-bold">*</span>
                                            <label class="text-danger" data-toggle="tooltip" data-placement="top" title="فقط حروف انگلیسی مورد تایید است. نام کاربری ثابت و غیرقابل تغییر می باشد.">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                            </label>

                                            <input type="text" class="form-control {{!is_null(Auth::user()->fnameusername)?'is-valid':''}}" placeholder="نام کاربری خود را وارد کنید" value='{{old('username',Auth::user()->username)}}'  name="username" {{!is_null(Auth::user()->username)?'disabled':''}}/>


                                        </div>
                                    </div>
                                    <div class="col-md-12 px-1">
                                        <div class="form-group">
                                            <label>درباره من</label>
                                            <textarea class="form-control {{Auth::user()->aboutme?'is-valid':''}}" id="aboutme" name="aboutme" rows="3">{{old('aboutme',Auth::user()->aboutme)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mb-5">بروزرسانی</button>

                    </form>
                </div>


                <!-- /.tab-Contacts -->
                <div class="tab-pane" id="contacts">
                    <form method="post" action="{{route('user.profile.update')}}" >
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card card-user">
                            <div class="card-body bg-secondary-light" id="infoProfile">
                                <div class="row">
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>تلفن تماس</label>
                                            <input type="hidden" id="tel_org" value="{{old('tel',Auth::user()->tel)}}" name="tel"/>
                                            <input type="tel" dir="ltr" class="form-control {{!is_null(Auth::user()->tel)?'is-valid':''}}" placeholder="تلفن تماس را وارد کنید" value='{{old('tel',Auth::user()->tel)}}'  id="tel"  {{!is_null(Auth::user()->tel)?'disabled':''}}  />
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label for="email">پست الکترونیکی</label>
                                            <input type="email" class="form-control {{!is_null(Auth::user()->email)?'is-valid':''}}" placeholder="پست الکترونیکی را وارد کنید" value="{{old('email',Auth::user()->email)}}" {{!is_null(Auth::user()->email?'disabled':'')}} name="email"  id="email"  />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <livewire:crm::user.location />
                                    </div>


                                    <div class="col-md-12 px-1">
                                        <div class="form-group">
                                            <label>آدرس</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->address)?'is-valid':''}}" placeholder="آدرس را وارد کنید" value='{{old('address',Auth::user())->address}}'   name="address"   />
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>اینستاگرام</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->instagram?'is-valid':'')}}" placeholder="صفحه اینستاگرام خود را وارد کنید" value='{{old('instagram',Auth::user()->instagram)}}' name="instagram"  />
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>تلگرام</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->telegram?'is-valid':'')}}" placeholder="آیدی تلگرام خود را وارد کنید" value='{{old('telegram',Auth::user()->telegram)}}'   name="telegram"  />
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>لینکدین</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->linkedin?'is-valid':'')}}" placeholder="آیدی لینکدین خود را وارد کنید"  value='{{old('linkedin',Auth::user()->linkedin)}}'   name="linkedin"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mb-5">بروزرسانی</button>
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="gettingknow">
                    <livewire:crm::user.getting-know />

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="contract">
                    <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="card card-user">
                            <div class="card-body bg-secondary-light" id="infoProfile">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-warning" role="alert">
                                            <small>این اطلاعات صرفاجهت عقد قراردادهای آموزشی و ارائه خدمات کوچینگ مورد نیاز است</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>نام پدر</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->father)?'is-valid':''}}" placeholder=" نام پدر را وارد کنید" value='{{old('father',Auth::user()->father )}}'   name="father" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">جنسیت</label>
                                            <div class="form-group">
                                                <select class="form-control p-0 {{!is_null(Auth::user()->sex)?'is-valid':''}}" id="exampleFormControlSelect1" name="sex" >
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option value="0" {{ Auth::user()->sex=="0"?'selected':'' }}>زن</option>
                                                    <option value="1" {{ Auth::user()->sex=="1"?'selected':'' }}>مرد</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>تاهل</label>
                                            <div class="form-group">
                                                <select class="form-control p-0 {{!is_null(Auth::user()->married)?'is-valid':''}}" id="exampleFormControlSelect1" name="married" >
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option value="0" {{ Auth::user()->married=="0" ? 'selected' : '' }}>مجرد</option>
                                                    <option value="1" {{ Auth::user()->married=="1" ? 'selected' : '' }}>متاهل</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>شهر تولد</label>
                                            <input type="text" class="form-control {{!is_null(Auth::user()->born)?'is-valid':''}}" placeholder="شهر تولد را وارد کنید"  value='{{old('born',Auth::user()->born)}}' name="born"  />
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>تحصیلات</label>
                                            <select class="custom-select {{!is_null(Auth::user()->education)?'is-valid':''}}" name="education" id="education">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option {{ old('education',Auth::user()->education)=="زیردیپلم" ? 'selected' : '' }}   >زیردیپلم</option>
                                                <option {{ old('education',Auth::user()->education)=="دیپلم" ? 'selected' : '' }}>دیپلم</option>
                                                <option {{ old('education',Auth::user()->education)=="فوق دیپلم" ? 'selected' : '' }}>فوق دیپلم</option>
                                                <option {{ old('education',Auth::user()->education)=="لیسانس" ? 'selected' : '' }}>لیسانس</option>
                                                <option {{ old('education',Auth::user()->education)=="فوق لیسانس" ? 'selected' : '' }}>فوق لیسانس</option>
                                                <option {{ old('education',Auth::user()->education)=="دکتری و بالاتر" ? 'selected'.'"' : '' }}>دکتری و بالاتر</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>رشته</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control {{!is_null(Auth::user()->reshteh)?'is-valid':''}}" placeholder="رشته را وارد کنید"  value='{{old('reshteh',Auth::user()->reshteh)}}'  name="reshteh" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>شغل</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control {{!is_null(Auth::user()->job)?'is-valid':''}}" placeholder="شغل را وارد کنید"  value='{{old('job',Auth::user()->job  )}}' name="job" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>عکس شناسنامه</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{!is_null(Auth::user()->shenasnameh_image)?'is-valid':''}}" id="inputshenasnameh_image" aria-describedby="inputshenasnameh_image" name="shenasnameh_image" />
                                                <label class="custom-file-label" for="inputshenasnameh_image">Choose file</label>
                                            </div>
                                            <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>عکس کارت ملی</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{!is_null(Auth::user()->cartmelli_image)?'is-valid':''}}" id="inputcartmelli_image" aria-describedby="inputcartmelli_image" name="cartmelli_image">
                                                <label class="custom-file-label" for="inputcartmelli_image">Choose file</label>
                                            </div>
                                            <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>عکس مدرک تحصیلی</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{!is_null(Auth::user()->education_image)?'is-valid':''}}" id="inputeducation_image" aria-describedby="inputeducation_image" name="education_image" />
                                                <label class="custom-file-label" for="inputeducation_image">Choose file</label>
                                            </div>
                                            <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>رزومه</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{!is_null(Auth::user()->resume)?'is-valid':''}}" id="resume" aria-describedby="resume" name="resume" />
                                                <label class="custom-file-label" for="resume">Choose file</label>
                                            </div>
                                            <small class="text-muted"> فایل های مجاز: JPG , DOC و PDF و حداکثر اندازه مجاز: 600KB</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mb-5">بروزرسانی</button>

                    </form>
                </div>
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
@endcomponent
