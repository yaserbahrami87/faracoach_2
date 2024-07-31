<div>
    <!-- Modal -->


    <table class="table">
        <tr>
            <th>ردیف</th>
            <th>عکس</th>
            <th>نام و نام خانوادگی</th>
            <th>تلفن</th>
            <th>وضعیت</th>
            <th>تاریخ عضویت</th>
            <th>تعداد پیگیری</th>
            <th>تعداد ورود</th>
            <th>آخرین ورود</th>
        </tr>
            @foreach($User->get_invitation as $user)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <th>
                        @if(is_null($user->personal_image))
                            <img src="/images/users/default-avatar.png" width="50px" height="50px" class="rounded-circle" />
                        @else
                            <img src="/images/users/{{$user->personal_image}}" width="50px" height="50px" class="rounded-circle" />
                        @endif
                    </th>
                    <th>
                        {{$user->fname.' '.$user->lname}}
                    </th>
                    <th>
                        <a href="{{route('admin.user.profile',$user->id)}}">{{$user->tel}}</a>
                    </th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            @endforeach
    </table>


