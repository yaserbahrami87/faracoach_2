<div wire:init="loadUsers" class="table-responsive" >
    <div class="row">
        <div class="col-12 col-md-1">
            <label>کاربر جدید</label>
            <a href="{{route('admin.user.insert')}}" class="btn btn-primary btn-block">
                <i class="bi bi-person-plus-fill"></i>
            </a>
        </div>
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label>دسته بندی:</label>
                <select class="form-control select2" style="width: 100%;" wire:model.change="resource">
                    <option value="NULL" selected>انتخاب کنید</option>
                    @foreach($resources as $resource)
                        <option value="{{$resource->resource}}">@if(is_null($resource->resource))  همه گزینه ها @else {{$resource->resource}} @endif</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <label>آمار و کاربرهای {{Auth::user()->fname}}:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="user_admin" value="1" wire:model="user_admin">
                <label class="form-check-label" for="user_admin">نمایش بده</label>
            </div>
        </div>
    </div>


    @if($readyToLoad)
                <a wire:click="userType('NULL')" href="#" class="btn btn-outline-info mb-2">نمایش همه
                    <span class="badge badge-info">{{$users_all}}</span>
                </a>


                <a wire:click="userType(1)" href="#" class="btn btn-outline-info mb-2">لید صفر
                    <span class="badge badge-info">{{$users_leads}}</span>
                </a>

                <a wire:click="userType('todayFollowups')" href="#" class="btn btn-outline-info mb-2">پیگیری های موعد
                    <span class="badge badge-warning">{{$todayFollowups}}</span>
                </a>

                <a wire:click="userType('expiredFollowups')" href="#" class="btn btn-outline-info mb-2">پیگیری های تاریخ گذشته
                    <span class="badge badge-danger">{{$expiredFollowups}}</span>
                </a>

                <a wire:click="userType('doneTodayFollowups')" href="#" class="btn btn-outline-info mb-2">پیگیری های انجام شده امروز
                    <span class="badge badge-success">{{$doneTodayFollowups}}</span>
                </a>

                <a wire:click="userType(11)" href="#" class="btn btn-outline-info mb-2">تور پیگیری
                    <span class="badge badge-info">{{$users_continueFollowup}}</span>
                </a>

                <a wire:click="userType(13)" href="#" class="btn btn-outline-info mb-2">در انتظار تصمیم
                    <span class="badge badge-info">{{$users_waiting}}</span>
                </a>

                <a wire:click="userType(14)" href="#" class="btn btn-outline-info mb-2">عدم پاسخ
                    <span class="badge badge-info">{{$users_noanswer}}</span>
                </a>

                <a wire:click="userType(20)" href="#" class="btn btn-outline-info mb-2">مشتری
                    <span class="badge badge-info">{{$users_customer}}</span>
                </a>

                <a wire:click="userType(30)" href="#" class="btn btn-outline-info mb-2">جلسات
                    <span class="badge badge-info">{{$users_meeting}}</span>
                </a>

                <a wire:click="userType(40)" href="#" class="btn btn-outline-info mb-2">رویداد
                    <span class="badge badge-info">{{$users_event}}</span>
                </a>

                <a wire:click="userType(-1)" href="#" class="btn btn-outline-info mb-2">مارکتینگ 1
                    <span class="badge badge-info">{{$marketing1}}</span>
                </a>

                <a wire:click="userType(-2)" href="#" class="btn btn-outline-info mb-2">مارکتینگ 2
                    <span class="badge badge-info">{{$marketing2}}</span>
                </a>

                <a wire:click="userType(-3)" href="#" class="btn btn-outline-info mb-2">مارکتینگ 3
                    <span class="badge badge-info">{{$marketing3}}</span>
                </a>





        <!-- DataTables -->
        <table id="example1" class="table table-bordered table-striped" wire:loading.remove >
            <thead>
            <tr>
                <th></th>
                <th>نام و نام خانوادگی</th>
                <th>شماره همراه</th>
                <th>ثبت کننده</th>
                <th>معرف</th>
                <th>ورود</th>
                <th>مسئول پیگیری</th>
                <th>تعداد پیگیری</th>
                <th>آخرین محصول پیگیری</th>
                <th>آخرین پیگیری</th>
                <th>وضعیت</th>
                <th>آخرین ورود</th>
                <th>تعداد ورود</th>
            </tr>
            </thead>
            <tbody >

            @foreach($users as $user)
                <tr>
                    <td>
                        @if(is_null($user->personal_image))
                            <img src="/images/users/default-avatar.png" width="50px" height="50px" class="rounded-circle" />
                        @else
                            <img src="/documents/users/{{$user->personal_image}}" width="50px" height="50px" class="rounded-circle" />
                        @endif
                    </td>
                    <td>{{$user->fname.' '.$user->lname}}</td>
                    <td dir="ltr">
                        <a href="{{route('admin.user.profile',$user->id)}}">{{$user->tel}}</a>
                    </td>
                    <td>
                        @if(!is_null($user->get_insertuserInfo))
                            {{$user->get_insertuserInfo->fname.' '.$user->get_insertuserInfo->lname}}
                        @endif
                    </td>
                    <td>
                        @if(!is_null($user->get_introduced))
                            {{$user->get_introduced->fname.' '.$user->get_introduced->lname}}
                        @endif
                    </td>
                    <td>
                        {{$user->resource}}
                    </td>
                    <td>
                        @if(!is_null($user->get_followByExpert))
                            {{$user->get_followByExpert->fname.' '.$user->get_followByExpert->lname}}
                        @endif
                    </td>
                    <td>{{$user->followups->count()}}</td>
                    <td>
                        @if($user->followups->count()>0)
                            {{($user->followups->last()->course->course)}}
                        @endif
                    </td>
                    <td>
                        @if($user->followups->count()>0)
                            {{($user->followups->last()->date_fa)}}
                        @endif
                    </td>
                    <td>
                        @if($user->userType)
                            {{($user->userType->type)}}
                        @endif
                    </td>
                    <td>#</td>
                    <td>#</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th>نام و نام خانوادگی</th>
                <th>شماره همراه</th>
                <th>ثبت کننده</th>
                <th>معرف</th>
                <th>ورود</th>
                <th>مسئول پیگیری</th>
                <th>تعداد پیگیری</th>
                <th>آخرین محصول پیگیری</th>
                <th>آخرین پیگیری</th>
                <th>وضعیت</th>
                <th>آخرین ورود</th>
                <th>تعداد ورود</th>
            </tr>
            </tfoot>
        </table>
    @else
            <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                <circle cx="170" cy="170" r="135" stroke="#404041"/>
                <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                <circle cx="170" cy="170" r="85" stroke="#404041"/>
            </svg>
    @endif

    <div wire:loading >
        <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
            <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
            <circle cx="170" cy="170" r="135" stroke="#404041"/>
            <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
            <circle cx="170" cy="170" r="85" stroke="#404041"/>
        </svg>
    </div>
</div>


<script>
    window.addEventListener('dataTable',()=>
    {
        let head = document.getElementsByTagName('HEAD')[0];

        let link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '/dashboard/plugins/dataTables2/css/dataTables.dataTables.css';
        head.appendChild(link);

        let link2 = document.createElement('link');
        link2.rel = 'stylesheet';
        link2.href = '/dashboard/plugins/datatables/jquery.dataTables_themeroller.css';
        head.appendChild(link2);

        let link3 = document.createElement('link');
        link3.rel = 'stylesheet';
        link3.href = '/dashboard/plugins/datatables/dataTables.bootstrap4.css';
        head.appendChild(link3);

        let link1 = document.createElement('script');
        link1.src='/dashboard/plugins/datatables/jquery.dataTables.js';
        head.appendChild(link1);

        $("#example1").DataTable();
    });
</script>


