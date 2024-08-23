<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon material-icons">spa</i>
        <p>
            کلینیک
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('user.clinic.coach.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>درخواست همکاری</p>
            </a>
        </li>
        @if(Auth::user()->is_coach)
            <li class="nav-item">
                <a href="{{route('user.clinic.booking.all')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>جلسات</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.clinic.coach.setting')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تنظیمات جلسه</p>
                </a>
            </li>

        @endif
    </ul>
</li>
