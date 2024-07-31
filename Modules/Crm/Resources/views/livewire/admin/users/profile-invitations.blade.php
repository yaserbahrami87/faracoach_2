<div>
    @if($readyToLoad)
        <div class="alert alert-warning" wire:offline>
            <i class="fa-wifi"></i> مشکل در اتصال به اینترنت رخ داد است
        </div>

        @if($User->get_invitation->count()==0)
            <div class="alert alert-warning">
                کاربری معرفی نشده است
            </div>
        @else
            <!-- DataTables -->
            <table id="example1" class="table table-bordered table-striped" wire:loading.remove >
                <thead>
                <tr>
                    <th></th>
                    <th>نام و نام خانوادگی</th>
                    <th>شماره همراه</th>
                    <th>تعداد معرف</th>
                    <th>تاریخ ثبت نام</th>

                </tr>
                </thead>
                <tbody >

                @foreach($User->get_invitation as $invite)

                    <tr>
                        <td>
                            @if(is_null($invite->personal_image))
                                <img src="/images/users/default-avatar.png" width="50px" height="50px" class="rounded-circle" />
                            @else
                                <img src="/images/users/{{$invite->personal_image}}" width="50px" height="50px" class="rounded-circle" />
                            @endif
                        </td>
                        <td>{{$invite->fname.' '.$invite->lname}}</td>
                        <td dir="ltr">
                            <a href="{{route('admin.user.profile',$invite->id)}}">{{$invite->tel}}</a>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success" wire:key="{{$invite->id}}" wire:click="$emit('openModal', 'crm::admin.users.profile-invitations-modal',{{ json_encode(['user' => $invite->id]) }})">
                                {{$invite->get_invitation->count()}}</button>

                        </td>
                        <td>{{\App\Services\JalaliDate::changeTimestampToShamsi($invite->created_at)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>نام و نام خانوادگی</th>
                    <th>شماره همراه</th>
                    <th>تعداد معرف</th>
                    <th>تاریخ ثبت نام</th>
                </tr>
                </tfoot>
            </table>
        @endif
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
