<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>
            کلینیک
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('user.clinic.coach.create')}}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>درخواست همکاری</p>
            </a>
        </li>
        @if(Auth::user()->is_coach)
            <li class="nav-item">
                <a href="{{route('user.clinic.coach.setting')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تنظیمات جلسه</p>
                </a>
            </li>

        @endif
    </ul>
</li>
