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
            <a href="{{route('admin.clinic.coach.requests')}}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>درخواست های همکاری</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.clinic.categories')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>دسته بندی ها</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.clinic.coach.setting')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>تنظیمات کلینیک</p>
            </a>
        </li>
    </ul>
</li>
